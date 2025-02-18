<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyClinicRequest;
use App\Http\Requests\StoreClinicRequest;
use App\Http\Requests\UpdateClinicRequest;
use App\Models\Clinic;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ClinicsController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('clinic_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Clinic::with(['user'])->select(sprintf('%s.*', (new Clinic)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'clinic_show';
                $editGate      = 'clinic_edit';
                $deleteGate    = 'clinic_delete';
                $crudRoutePart = 'clinics';

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
            $table->editColumn('clinic_name', function ($row) {
                return $row->clinic_name ? $row->clinic_name : '';
            });
            $table->editColumn('clinic_phone', function ($row) {
                return $row->clinic_phone ? $row->clinic_phone : '';
            });
            $table->editColumn('unified_phone', function ($row) {
                return $row->unified_phone ? $row->unified_phone : '';
            });
            $table->editColumn('short_description', function ($row) {
                return $row->short_description ? $row->short_description : '';
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
            $table->addColumn('user_name', function ($row) {
                return $row->user ? $row->user->name : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'logo', 'user']);

            return $table->make(true);
        }

        return view('admin.clinics.index');
    }

    public function create()
    {
        abort_if(Gate::denies('clinic_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.clinics.create', compact('users'));
    }

    public function store(StoreClinicRequest $request)
    {
        $clinic = Clinic::create($request->all());

        if ($request->input('cover', false)) {
            $clinic->addMedia(storage_path('tmp/uploads/' . basename($request->input('cover'))))->toMediaCollection('cover');
        }

        if ($request->input('logo', false)) {
            $clinic->addMedia(storage_path('tmp/uploads/' . basename($request->input('logo'))))->toMediaCollection('logo');
        }

        if ($request->input('about_us_image', false)) {
            $clinic->addMedia(storage_path('tmp/uploads/' . basename($request->input('about_us_image'))))->toMediaCollection('about_us_image');
        }

        if ($request->input('certification', false)) {
            $clinic->addMedia(storage_path('tmp/uploads/' . basename($request->input('certification'))))->toMediaCollection('certification');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $clinic->id]);
        }

        return redirect()->route('admin.clinics.index');
    }

    public function edit(Clinic $clinic)
    {
        abort_if(Gate::denies('clinic_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $clinic->load('user');

        return view('admin.clinics.edit', compact('clinic', 'users'));
    }

    public function update(UpdateClinicRequest $request, Clinic $clinic)
    {
        $clinic->update($request->all());

        if ($request->input('cover', false)) {
            if (! $clinic->cover || $request->input('cover') !== $clinic->cover->file_name) {
                if ($clinic->cover) {
                    $clinic->cover->delete();
                }
                $clinic->addMedia(storage_path('tmp/uploads/' . basename($request->input('cover'))))->toMediaCollection('cover');
            }
        } elseif ($clinic->cover) {
            $clinic->cover->delete();
        }

        if ($request->input('logo', false)) {
            if (! $clinic->logo || $request->input('logo') !== $clinic->logo->file_name) {
                if ($clinic->logo) {
                    $clinic->logo->delete();
                }
                $clinic->addMedia(storage_path('tmp/uploads/' . basename($request->input('logo'))))->toMediaCollection('logo');
            }
        } elseif ($clinic->logo) {
            $clinic->logo->delete();
        }

        if ($request->input('about_us_image', false)) {
            if (! $clinic->about_us_image || $request->input('about_us_image') !== $clinic->about_us_image->file_name) {
                if ($clinic->about_us_image) {
                    $clinic->about_us_image->delete();
                }
                $clinic->addMedia(storage_path('tmp/uploads/' . basename($request->input('about_us_image'))))->toMediaCollection('about_us_image');
            }
        } elseif ($clinic->about_us_image) {
            $clinic->about_us_image->delete();
        }

        if ($request->input('certification', false)) {
            if (! $clinic->certification || $request->input('certification') !== $clinic->certification->file_name) {
                if ($clinic->certification) {
                    $clinic->certification->delete();
                }
                $clinic->addMedia(storage_path('tmp/uploads/' . basename($request->input('certification'))))->toMediaCollection('certification');
            }
        } elseif ($clinic->certification) {
            $clinic->certification->delete();
        }

        return redirect()->route('admin.clinics.index');
    }

    public function show(Clinic $clinic)
    {
        abort_if(Gate::denies('clinic_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clinic->load('user', 'clinicClinicServices', 'clinicClinicReviews');

        return view('admin.clinics.show', compact('clinic'));
    }

    public function destroy(Clinic $clinic)
    {
        abort_if(Gate::denies('clinic_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clinic->delete();

        return back();
    }

    public function massDestroy(MassDestroyClinicRequest $request)
    {
        $clinics = Clinic::find(request('ids'));

        foreach ($clinics as $clinic) {
            $clinic->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('clinic_create') && Gate::denies('clinic_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Clinic();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
