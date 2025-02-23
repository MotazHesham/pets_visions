<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\PetType;
use App\Models\UserPet; 
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media; 

class UserPetsController extends Controller
{ 

    public function my_pets(){
        $user = auth()->user();

        $pet_types = PetType::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.dashboard.my-pets',compact('user','pet_types'));
    }
    public function store(Request $request){
        $user = auth()->user();
        $request->validate([
            'name' => [
                'string',
                'max:255',
                'required',
            ],
            'dob' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'gender' => [
                'required',
            ],
            'pet_type_id' => [
                'required',
                'integer',
                'exists:user_pets,id'
            ],
            'fasila' => [
                'string',
                'max:255',
                'required',
            ], 
            'photo' => [
                'required',
                'image',
                'max:4096',
            ]
        ]);
        $request->merge(['user_id' => $user->id]);
        $userPet = UserPet::create($request->only([ 'name', 'dob', 'gender', 'pet_type_id', 'fasila', 'user_id']));
        
        if ($request->photo) {
            $userPet->addMedia($request->photo)->toMediaCollection('photo');
        }

        toast(trans('frontend.toast.success'),'success');
        return redirect()->route('frontend.dashboard.my-pets');
    }  

    public function update(Request $request)
    {
        $request->validate([
            'id' => [
                'required',
                'integer',
                'exists:user_pets,id'
            ],
            'name' => [
                'string',
                'max:255',
                'required',
            ],
            'dob' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'gender' => [
                'required',
            ],
            'pet_type_id' => [
                'required',
                'integer',
                'exists:pet_types,id'
            ],
            'fasila' => [
                'string',
                'max:255',
                'required',
            ], 
            'photo' => [
                'nullable',
                'image',
                'max:4096',
            ]
        ]);
        $userPet = UserPet::findOrFail($request->id);
        $userPet->update($request->only([ 'name', 'dob', 'gender', 'pet_type_id', 'fasila']));

        if ($request->photo) {
            $userPet->addMedia($request->photo)->toMediaCollection('photo');
        }

        toast(trans('frontend.toast.success'),'success');
        return redirect()->route('frontend.dashboard.my-pets.show',$userPet->id);
    }

    public function show($id)
    { 
        $pet_types = PetType::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $userPet = UserPet::findOrFail($id);
        $userPet->load('pet_type', 'user');

        return view('frontend.dashboard.show_pet', compact('userPet','pet_types'));
    }

    public function destroy($id)
    { 
        $userPet = UserPet::findOrFail($id);
        $userPet->delete();

        toast(trans('frontend.toast.success'),'success');
        return redirect()->route('frontend.dashboard.my-pets');
    } 
}
