<?php

namespace App\Http\Controllers\petCompanion;

use App\Http\Controllers\Controller; 
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\UpdateHostingRequest;
use App\Http\Requests\UpdatePetCompanionRequest;
use App\Http\Requests\UpdateStoreRequest;
use App\Models\PetCompanion;
use App\Models\PetType;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProfileController extends Controller
{
    use MediaUploadingTrait;
    
    public function edit()
    {  
        $user = auth()->user();
        $petCompanion = auth()->user()->petCompanion;  
        $specializations = PetType::pluck('name', 'id');
        return view('petCompanion.edit',compact('user','petCompanion','specializations'));
    }

    public function updateProfile(UpdatePetCompanionRequest $request)
    {
        $user = auth()->user();
        $petCompanion = auth()->user()->petCompanion; 
        
        $petCompanion->update([  
            'nationality' => $request->nationality,
            'experience' => $request->experience,
            'affiliation_link' => $request->affiliation_link, 
        ]);
        $user->update([  
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => $request->password, 
            'identity_num' => $request->identity_num,  
        ]);
        
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


        toast('تم بنجاح','success');
        return redirect()->route('pet-companion.profile.edit');
    } 
    
    public function storeCKEditorImages(Request $request)
    { 
        $model         = new PetCompanion();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
