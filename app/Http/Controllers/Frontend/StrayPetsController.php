<?php

namespace App\Http\Controllers\Frontend;

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

class StrayPetsController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('stray_pet_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $strayPets = StrayPet::with(['user', 'pet_type', 'media'])->get();

        return view('frontend.strayPets.index', compact('strayPets'));
    }

    public function create()
    {
        abort_if(Gate::denies('stray_pet_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $pet_types = PetType::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.strayPets.create', compact('pet_types', 'users'));
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

        return redirect()->route('frontend.stray-pets.index');
    }

    public function edit(StrayPet $strayPet)
    {
        abort_if(Gate::denies('stray_pet_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $pet_types = PetType::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $strayPet->load('user', 'pet_type');

        return view('frontend.strayPets.edit', compact('pet_types', 'strayPet', 'users'));
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

        return redirect()->route('frontend.stray-pets.index');
    }

    public function show(StrayPet $strayPet)
    {
        abort_if(Gate::denies('stray_pet_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $strayPet->load('user', 'pet_type');

        return view('frontend.strayPets.show', compact('strayPet'));
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
