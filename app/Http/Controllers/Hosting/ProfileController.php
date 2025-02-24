<?php

namespace App\Http\Controllers\Hosting;

use App\Http\Controllers\Controller; 
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\UpdateHostingRequest;
use App\Models\Hosting;
use App\Models\HostingService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProfileController extends Controller
{
    use MediaUploadingTrait;
    
    public function edit()
    {  
        $user = auth()->user();
        $hosting = auth()->user()->hosting;
        $hosting_services = HostingService::pluck('name', 'id');
        return view('hosting.edit',compact('user','hosting','hosting_services'));
    }

    public function updateProfile(UpdateHostingRequest $request)
    {
        $user = auth()->user();
        $hosting = auth()->user()->hosting;
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

        toast('تم بنجاح','success');
        return redirect()->route('hosting.profile.edit');
    } 
    
    public function storeCKEditorImages(Request $request)
    { 
        $model         = new Hosting();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
