<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyUserPetRequest;
use App\Http\Requests\StoreUserPetRequest;
use App\Http\Requests\UpdateUserPetRequest;
use App\Models\PetType;
use App\Models\User;
use App\Models\UserPet;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class UserPetsController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('user_pet_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $userPets = UserPet::with(['pet_type', 'user', 'media'])->get();

        return view('frontend.userPets.index', compact('userPets'));
    }

    public function create()
    {
        abort_if(Gate::denies('user_pet_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pet_types = PetType::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.userPets.create', compact('pet_types', 'users'));
    }

    public function store(StoreUserPetRequest $request)
    {
        $userPet = UserPet::create($request->all());

        if ($request->input('photo', false)) {
            $userPet->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $userPet->id]);
        }

        return redirect()->route('frontend.user-pets.index');
    }

    public function edit(UserPet $userPet)
    {
        abort_if(Gate::denies('user_pet_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pet_types = PetType::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $userPet->load('pet_type', 'user');

        return view('frontend.userPets.edit', compact('pet_types', 'userPet', 'users'));
    }

    public function update(UpdateUserPetRequest $request, UserPet $userPet)
    {
        $userPet->update($request->all());

        if ($request->input('photo', false)) {
            if (! $userPet->photo || $request->input('photo') !== $userPet->photo->file_name) {
                if ($userPet->photo) {
                    $userPet->photo->delete();
                }
                $userPet->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
            }
        } elseif ($userPet->photo) {
            $userPet->photo->delete();
        }

        return redirect()->route('frontend.user-pets.index');
    }

    public function show(UserPet $userPet)
    {
        abort_if(Gate::denies('user_pet_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $userPet->load('pet_type', 'user');

        return view('frontend.userPets.show', compact('userPet'));
    }

    public function destroy(UserPet $userPet)
    {
        abort_if(Gate::denies('user_pet_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $userPet->delete();

        return back();
    }

    public function massDestroy(MassDestroyUserPetRequest $request)
    {
        $userPets = UserPet::find(request('ids'));

        foreach ($userPets as $userPet) {
            $userPet->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('user_pet_create') && Gate::denies('user_pet_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new UserPet();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
