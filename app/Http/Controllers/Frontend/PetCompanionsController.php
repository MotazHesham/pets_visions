<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyPetCompanionRequest;
use App\Http\Requests\StorePetCompanionRequest;
use App\Http\Requests\UpdatePetCompanionRequest;
use App\Models\PetCompanion;
use App\Models\PetType;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class PetCompanionsController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('pet_companion_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $petCompanions = PetCompanion::with(['user', 'specializations', 'media'])->get();

        return view('frontend.petCompanions.index', compact('petCompanions'));
    }

    public function create()
    {
        abort_if(Gate::denies('pet_companion_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $specializations = PetType::pluck('name', 'id');

        return view('frontend.petCompanions.create', compact('specializations', 'users'));
    }

    public function store(StorePetCompanionRequest $request)
    {
        $petCompanion = PetCompanion::create($request->all());
        $petCompanion->specializations()->sync($request->input('specializations', []));
        if ($request->input('photo', false)) {
            $petCompanion->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $petCompanion->id]);
        }

        return redirect()->route('frontend.pet-companions.index');
    }

    public function edit(PetCompanion $petCompanion)
    {
        abort_if(Gate::denies('pet_companion_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $specializations = PetType::pluck('name', 'id');

        $petCompanion->load('user', 'specializations');

        return view('frontend.petCompanions.edit', compact('petCompanion', 'specializations', 'users'));
    }

    public function update(UpdatePetCompanionRequest $request, PetCompanion $petCompanion)
    {
        $petCompanion->update($request->all());
        $petCompanion->specializations()->sync($request->input('specializations', []));
        if ($request->input('photo', false)) {
            if (! $petCompanion->photo || $request->input('photo') !== $petCompanion->photo->file_name) {
                if ($petCompanion->photo) {
                    $petCompanion->photo->delete();
                }
                $petCompanion->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
            }
        } elseif ($petCompanion->photo) {
            $petCompanion->photo->delete();
        }

        return redirect()->route('frontend.pet-companions.index');
    }

    public function show(PetCompanion $petCompanion)
    {
        abort_if(Gate::denies('pet_companion_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $petCompanion->load('user', 'specializations');

        return view('frontend.petCompanions.show', compact('petCompanion'));
    }

    public function destroy(PetCompanion $petCompanion)
    {
        abort_if(Gate::denies('pet_companion_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $petCompanion->delete();

        return back();
    }

    public function massDestroy(MassDestroyPetCompanionRequest $request)
    {
        $petCompanions = PetCompanion::find(request('ids'));

        foreach ($petCompanions as $petCompanion) {
            $petCompanion->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('pet_companion_create') && Gate::denies('pet_companion_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new PetCompanion();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
