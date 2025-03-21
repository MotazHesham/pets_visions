<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyHostingRequest;
use App\Http\Requests\StoreHostingRequest;
use App\Http\Requests\UpdateHostingRequest;
use App\Models\Hosting;
use App\Models\HostingService;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class HostingsController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('hosting_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Hosting::with(['user', 'hosting_services'])->select(sprintf('%s.*', (new Hosting)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'hosting_show';
                $editGate      = 'hosting_edit';
                $deleteGate    = 'hosting_delete';
                $crudRoutePart = 'hostings';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->addColumn('user_name', function ($row) {
                return $row->user ? $row->user->name : '';
            });

            $table->editColumn('hosting_name', function ($row) {
                return $row->hosting_name ? $row->hosting_name : '';
            });
            $table->editColumn('hosting_phone', function ($row) {
                return $row->hosting_phone ? $row->hosting_phone : '';
            });
            $table->editColumn('hosting_type', function ($row) {
                return $row->hosting_type ? Hosting::HOSTING_TYPE_SELECT[$row->hosting_type] : '';
            });
            $table->editColumn('logo', function ($row) {
                if ($photo = $row->logo) {
                    return sprintf(
                        '<a href="%s" target="_blank"><img src="%s" width="50px" height="50px"></a>',
                        $photo->url,
                        $photo->thumbnail
                    );
                }

                return '';
            });
            $table->editColumn('hosting_services', function ($row) {
                $labels = [];
                foreach ($row->hosting_services as $hosting_service) {
                    $labels[] = sprintf('<span class="label label-info label-many">%s</span>', $hosting_service->name);
                }

                return implode(' ', $labels);
            });
            $table->editColumn('user_approved', function ($row) {
                return '<label class="c-switch c-switch-pill c-switch-success">
                            <input onchange="update_statuses(this,\'approved\')" value="'. $row->user_id .'" type="checkbox" class="c-switch-input" '. ($row->user->approved ? "checked" : null) .' >
                            <span class="c-switch-slider"></span>
                        </label>' ;
            });

            $table->rawColumns(['actions', 'placeholder', 'user', 'user_approved', 'logo', 'hosting_services']);

            return $table->make(true);
        }

        return view('admin.hostings.index');
    }

    public function create()
    {
        abort_if(Gate::denies('hosting_create'), Response::HTTP_FORBIDDEN, '403 Forbidden'); 

        $hosting_services = HostingService::pluck('name', 'id');

        return view('admin.hostings.create', compact('hosting_services' ));
    }

    public function store(StoreHostingRequest $request)
    { 
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => $request->password,
            'approved' => 1,
            'user_type' => 'host',
            'identity_num' => $request->identity_num, 
            'user_position' => $request->user_position,
        ]);
        $hosting = Hosting::create([    
            'user_id' => $user->id,
            'hosting_name' => $request->hosting_name,
            'hosting_phone' => $request->hosting_phone,
            'hosting_type' => $request->hosting_type,
            'short_description' => $request->short_description,
            'address' => $request->address,
            'affiliation_link' => $request->affiliation_link,
            'about_us' => $request->about_us, 
        ]);
        $hosting->hosting_services()->sync($request->input('hosting_services', []));
        if ($request->input('logo', false)) {
            $hosting->addMedia(storage_path('tmp/uploads/' . basename($request->input('logo'))))->toMediaCollection('logo');
        }

        if ($request->input('cover', false)) {
            $hosting->addMedia(storage_path('tmp/uploads/' . basename($request->input('cover'))))->toMediaCollection('cover');
        }

        foreach ($request->input('photos', []) as $file) {
            $hosting->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('photos');
        }

        if ($request->input('identity_photo', false)) {
            $hosting->addMedia(storage_path('tmp/uploads/' . basename($request->input('identity_photo'))))->toMediaCollection('identity_photo');
        }

        if ($request->input('commercial_register_photo', false)) {
            $hosting->addMedia(storage_path('tmp/uploads/' . basename($request->input('commercial_register_photo'))))->toMediaCollection('commercial_register_photo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $hosting->id]);
        }

        return redirect()->route('admin.hostings.index');
    }

    public function edit(Hosting $hosting)
    {
        abort_if(Gate::denies('hosting_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden'); 

        $hosting_services = HostingService::pluck('name', 'id');

        $hosting->load('user', 'hosting_services');

        $user = $hosting->user;

        return view('admin.hostings.edit', compact('hosting', 'hosting_services', 'user'));
    }

    public function update(UpdateHostingRequest $request, Hosting $hosting)
    {
        $user = $hosting->user;
        $user->update([     
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => $request->password, 
            'identity_num' => $request->identity_num, 
            'user_position' => $request->user_position,
        ]);
        
        $hosting->update([     
            'hosting_name' => $request->hosting_name,
            'hosting_phone' => $request->hosting_phone,
            'hosting_type' => $request->hosting_type,
            'short_description' => $request->short_description,
            'address' => $request->address,
            'affiliation_link' => $request->affiliation_link,
            'about_us' => $request->about_us, 
        ]); 
        $hosting->hosting_services()->sync($request->input('hosting_services', []));
        if ($request->input('logo', false)) {
            if (! $hosting->logo || $request->input('logo') !== $hosting->logo->file_name) {
                if ($hosting->logo) {
                    $hosting->logo->delete();
                }
                $hosting->addMedia(storage_path('tmp/uploads/' . basename($request->input('logo'))))->toMediaCollection('logo');
            }
        } elseif ($hosting->logo) {
            $hosting->logo->delete();
        }

        if ($request->input('cover', false)) {
            if (! $hosting->cover || $request->input('cover') !== $hosting->cover->file_name) {
                if ($hosting->cover) {
                    $hosting->cover->delete();
                }
                $hosting->addMedia(storage_path('tmp/uploads/' . basename($request->input('cover'))))->toMediaCollection('cover');
            }
        } elseif ($hosting->cover) {
            $hosting->cover->delete();
        }

        if (count($hosting->photos) > 0) {
            foreach ($hosting->photos as $media) {
                if (! in_array($media->file_name, $request->input('photos', []))) {
                    $media->delete();
                }
            }
        }
        $media = $hosting->photos->pluck('file_name')->toArray();
        foreach ($request->input('photos', []) as $file) {
            if (count($media) === 0 || ! in_array($file, $media)) {
                $hosting->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('photos');
            }
        }

        if ($request->input('identity_photo', false)) {
            if (! $hosting->identity_photo || $request->input('identity_photo') !== $hosting->identity_photo->file_name) {
                if ($hosting->identity_photo) {
                    $hosting->identity_photo->delete();
                }
                $hosting->addMedia(storage_path('tmp/uploads/' . basename($request->input('identity_photo'))))->toMediaCollection('identity_photo');
            }
        } elseif ($hosting->identity_photo) {
            $hosting->identity_photo->delete();
        }

        if ($request->input('commercial_register_photo', false)) {
            if (! $hosting->commercial_register_photo || $request->input('commercial_register_photo') !== $hosting->commercial_register_photo->file_name) {
                if ($hosting->commercial_register_photo) {
                    $hosting->commercial_register_photo->delete();
                }
                $hosting->addMedia(storage_path('tmp/uploads/' . basename($request->input('commercial_register_photo'))))->toMediaCollection('commercial_register_photo');
            }
        } elseif ($hosting->commercial_register_photo) {
            $hosting->commercial_register_photo->delete();
        }

        return redirect()->route('admin.hostings.index');
    }

    public function show(Hosting $hosting)
    {
        abort_if(Gate::denies('hosting_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hosting->load('user', 'hosting_services');
        $user = $hosting->user;
        return view('admin.hostings.show', compact('hosting','user'));
    }

    public function destroy(Hosting $hosting)
    {
        abort_if(Gate::denies('hosting_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hosting->delete();

        return back();
    }

    public function massDestroy(MassDestroyHostingRequest $request)
    {
        $hostings = Hosting::find(request('ids'));

        foreach ($hostings as $hosting) {
            $hosting->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('hosting_create') && Gate::denies('hosting_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Hosting();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
