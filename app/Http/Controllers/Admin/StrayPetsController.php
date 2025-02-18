<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyStrayPetRequest;
use App\Http\Requests\StoreStrayPetRequest;
use App\Http\Requests\UpdateStrayPetRequest;
use App\Models\PetType;
use App\Models\StrayPet;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class StrayPetsController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('stray_pet_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = StrayPet::with(['user', 'pet_type'])->select(sprintf('%s.*', (new StrayPet)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'stray_pet_show';
                $editGate      = 'stray_pet_edit';
                $deleteGate    = 'stray_pet_delete';
                $crudRoutePart = 'stray-pets';

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
            $table->editColumn('first_name', function ($row) {
                return $row->first_name ? $row->first_name : '';
            });
            $table->editColumn('last_name', function ($row) {
                return $row->last_name ? $row->last_name : '';
            });
            $table->editColumn('email', function ($row) {
                return $row->email ? $row->email : '';
            });
            $table->editColumn('phone', function ($row) {
                return $row->phone ? $row->phone : '';
            });
            $table->editColumn('missing_place', function ($row) {
                return $row->missing_place ? $row->missing_place : '';
            });
            $table->editColumn('receiving_place', function ($row) {
                return $row->receiving_place ? $row->receiving_place : '';
            });

            $table->editColumn('note', function ($row) {
                return $row->note ? $row->note : '';
            });
            $table->addColumn('user_name', function ($row) {
                return $row->user ? $row->user->name : '';
            });

            $table->addColumn('pet_type_name', function ($row) {
                return $row->pet_type ? $row->pet_type->name : '';
            });

            $table->editColumn('photo', function ($row) {
                if ($photo = $row->photo) {
                    return sprintf(
                        '<a href="%s" target="_blank"><img src="%s" width="50px" height="50px"></a>',
                        $photo->url,
                        $photo->thumbnail
                    );
                }

                return '';
            });
            $table->editColumn('affiliation_link', function ($row) {
                return $row->affiliation_link ? $row->affiliation_link : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'user', 'pet_type', 'photo']);

            return $table->make(true);
        }

        return view('admin.strayPets.index');
    }

    public function create()
    {
        abort_if(Gate::denies('stray_pet_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $pet_types = PetType::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.strayPets.create', compact('pet_types', 'users'));
    }

    public function store(StoreStrayPetRequest $request)
    {
        $strayPet = StrayPet::create($request->all());

        if ($request->input('photo', false)) {
            $strayPet->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $strayPet->id]);
        }

        return redirect()->route('admin.stray-pets.index');
    }

    public function edit(StrayPet $strayPet)
    {
        abort_if(Gate::denies('stray_pet_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $pet_types = PetType::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $strayPet->load('user', 'pet_type');

        return view('admin.strayPets.edit', compact('pet_types', 'strayPet', 'users'));
    }

    public function update(UpdateStrayPetRequest $request, StrayPet $strayPet)
    {
        $strayPet->update($request->all());

        if ($request->input('photo', false)) {
            if (! $strayPet->photo || $request->input('photo') !== $strayPet->photo->file_name) {
                if ($strayPet->photo) {
                    $strayPet->photo->delete();
                }
                $strayPet->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
            }
        } elseif ($strayPet->photo) {
            $strayPet->photo->delete();
        }

        return redirect()->route('admin.stray-pets.index');
    }

    public function show(StrayPet $strayPet)
    {
        abort_if(Gate::denies('stray_pet_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $strayPet->load('user', 'pet_type');

        return view('admin.strayPets.show', compact('strayPet'));
    }

    public function destroy(StrayPet $strayPet)
    {
        abort_if(Gate::denies('stray_pet_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $strayPet->delete();

        return back();
    }

    public function massDestroy(MassDestroyStrayPetRequest $request)
    {
        $strayPets = StrayPet::find(request('ids'));

        foreach ($strayPets as $strayPet) {
            $strayPet->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('stray_pet_create') && Gate::denies('stray_pet_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new StrayPet();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
