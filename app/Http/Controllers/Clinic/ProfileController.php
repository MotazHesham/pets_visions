<?php

namespace App\Http\Controllers\Clinic;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateClinicRequest;
use App\Http\Requests\UpdatePasswordRequest;
use App\Http\Requests\UpdateProfileRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProfileController extends Controller
{
    public function edit()
    {  
        $user = auth()->user();
        $clinic = auth()->user()->clinic;
        return view('clinic.edit',compact('user','clinic'));
    }

    public function updateProfile(UpdateClinicRequest $request)
    {
        $user = auth()->user();
        $clinic = auth()->user()->clinic;
        $user->update([ 
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => $request->password, 
            'identity_num' => $request->identity_num, 
            'user_position' => $request->user_position,
        ]);
        $clinic->update([ 
            'clinic_name' => $request->clinic_name,
            'clinic_phone' => $request->clinic_phone,
            'unified_phone' => $request->unified_phone,
            'short_description' => $request->short_description,
            'address' => $request->address,
            'description' => $request->description,
            'about_us' => $request->about_us, 
        ]);  

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

        toast('تم بنجاح','success');
        return redirect()->route('clinic.profile.edit');
    } 
}
