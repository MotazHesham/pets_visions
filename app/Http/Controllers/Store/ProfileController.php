<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller; 
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\UpdateHostingRequest;
use App\Http\Requests\UpdateStoreRequest;
use App\Models\PetType;

class ProfileController extends Controller
{
    use MediaUploadingTrait;
    
    public function edit()
    {  
        $user = auth()->user();
        $store = auth()->user()->store; 
        $specializations = PetType::pluck('name', 'id');
        return view('store.edit',compact('user','store','specializations'));
    }

    public function updateProfile(UpdateStoreRequest $request)
    {
        $user = auth()->user();
        $store = auth()->user()->store; 
        $user->update([ 
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => $request->password, 
            'identity_num' => $request->identity_num, 
            'user_position' => $request->user_position,
        ]); 
        $store->update([ 
            'store_name' => $request->store_name,
            'store_phone' => $request->store_phone,
            'address' => $request->address,   
            'domain' => $request->domain, 
        ]); 
        $store->specializations()->sync($request->input('specializations', []));
        if ($request->input('logo', false)) {
            if (! $store->logo || $request->input('logo') !== $store->logo->file_name) {
                if ($store->logo) {
                    $store->logo->delete();
                }
                $store->addMedia(storage_path('tmp/uploads/' . basename($request->input('logo'))))->toMediaCollection('logo');
            }
        } elseif ($store->logo) {
            $store->logo->delete();
        }

        if ($request->input('cover', false)) {
            if (! $store->cover || $request->input('cover') !== $store->cover->file_name) {
                if ($store->cover) {
                    $store->cover->delete();
                }
                $store->addMedia(storage_path('tmp/uploads/' . basename($request->input('cover'))))->toMediaCollection('cover');
            }
        } elseif ($store->cover) {
            $store->cover->delete();
        }

        if ($request->input('commercial_register_photo', false)) {
            if (! $store->commercial_register_photo || $request->input('commercial_register_photo') !== $store->commercial_register_photo->file_name) {
                if ($store->commercial_register_photo) {
                    $store->commercial_register_photo->delete();
                }
                $store->addMedia(storage_path('tmp/uploads/' . basename($request->input('commercial_register_photo'))))->toMediaCollection('commercial_register_photo');
            }
        } elseif ($store->commercial_register_photo) {
            $store->commercial_register_photo->delete();
        }


        toast('تم بنجاح','success');
        return redirect()->route('store.profile.edit');
    } 
}
