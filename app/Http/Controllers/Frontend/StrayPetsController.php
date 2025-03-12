<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller; 
use App\Models\PetType;
use App\Models\StrayPet;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class StrayPetsController extends Controller
{ 

    public function stray_pets()
    { 
        $strayPets = StrayPet::with(['user', 'pet_type', 'media'])->paginate(12);

        return view('frontend.strayPets.stray-pets', compact('strayPets'));
    }

    public function create($type)
    { 
        if(!in_array($type,array_keys(StrayPet::TYPE_SELECT))){
            abort(404);
        }
        
        $pet_types = PetType::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.strayPets.create', compact('pet_types' ,'type'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => [
                'required',
                'in:' . implode(',', array_keys(StrayPet::TYPE_SELECT)),
            ],
            'first_name' => [
                'string',
                'required',
                'max:255'
            ],
            'last_name' => [
                'string',
                'required',
                'max:255'
            ],
            'phone' => [
                'regex:/^05\d{8}$/',
                'required',
                'max:255'
            ],
            'missing_place' => [
                'string',
                'required',
                'max:255'
            ],
            'receiving_place' => [
                'string',
                'required',
                'max:255'
            ],
            'date' => [
                'date_format:' . config('panel.date_format'),
                'required',
            ],
            'affiliation_link' => [
                'string',
                'required',
                'max:255'
            ],
            'photo' => [
                'required',
                'image',
                'max:4096',
            ]
        ]);
        $strayPet = StrayPet::create($request->only([ 
            'type', 'first_name', 'last_name', 'email', 'phone',
            'missing_place', 'receiving_place', 'date', 'note', 
            'pet_type_id', 'affiliation_link'
        ]));

        if ($request->photo) {
            $strayPet->addMedia($request->photo)->toMediaCollection('photo');
        } 

        toast(trans('frontend.toast.success'),'success');
        return redirect()->back();
    }

}
