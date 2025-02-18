<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyAdoptionPetRequest;
use App\Http\Requests\StoreAdoptionPetRequest;
use App\Http\Requests\UpdateAdoptionPetRequest;
use App\Models\AdoptionPet;
use App\Models\PetType;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class AdoptionPetsController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('adoption_pet_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $adoptionPets = AdoptionPet::with(['user', 'pet_type', 'media'])->get();

        return view('frontend.adoptionPets.index', compact('adoptionPets'));
    }

    public function create()
    {
        abort_if(Gate::denies('adoption_pet_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $pet_types = PetType::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.adoptionPets.create', compact('pet_types', 'users'));
    }

    public function store(StoreAdoptionPetRequest $request)
    {
        $adoptionPet = AdoptionPet::create($request->all());

        if ($request->input('photo', false)) {
            $adoptionPet->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $adoptionPet->id]);
        }

        return redirect()->route('frontend.adoption-pets.index');
    }

    public function edit(AdoptionPet $adoptionPet)
    {
        abort_if(Gate::denies('adoption_pet_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $pet_types = PetType::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $adoptionPet->load('user', 'pet_type');

        return view('frontend.adoptionPets.edit', compact('adoptionPet', 'pet_types', 'users'));
    }

    public function update(UpdateAdoptionPetRequest $request, AdoptionPet $adoptionPet)
    {
        $adoptionPet->update($request->all());

        if ($request->input('photo', false)) {
            if (! $adoptionPet->photo || $request->input('photo') !== $adoptionPet->photo->file_name) {
                if ($adoptionPet->photo) {
                    $adoptionPet->photo->delete();
                }
                $adoptionPet->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
            }
        } elseif ($adoptionPet->photo) {
            $adoptionPet->photo->delete();
        }

        return redirect()->route('frontend.adoption-pets.index');
    }

    public function show(AdoptionPet $adoptionPet)
    {
        abort_if(Gate::denies('adoption_pet_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $adoptionPet->load('user', 'pet_type');

        return view('frontend.adoptionPets.show', compact('adoptionPet'));
    }

    public function destroy(AdoptionPet $adoptionPet)
    {
        abort_if(Gate::denies('adoption_pet_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $adoptionPet->delete();

        return back();
    }

    public function massDestroy(MassDestroyAdoptionPetRequest $request)
    {
        $adoptionPets = AdoptionPet::find(request('ids'));

        foreach ($adoptionPets as $adoptionPet) {
            $adoptionPet->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('adoption_pet_create') && Gate::denies('adoption_pet_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new AdoptionPet();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
