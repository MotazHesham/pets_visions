<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller; 
use App\Models\DeliveryPet;
use App\Models\PetType;
use Illuminate\Http\Request; 

class DeliveryPetsController extends Controller
{
    public function delivery_pets()
    {   
        $pet_types = PetType::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.delivery-pets',compact('pet_types'));
    } 

    public function store(Request $request)
    {
        $request->validate([
            'date' => [
                'date_format:' . config('panel.date_format'),
                'required',
            ],
            'name' => [
                'string',
                'required',
                'max:255',
            ],
            'phone' => [
                'string',
                'required',
                'max:255',
            ],
            'email' => [
                'string',
                'required',
                'max:255',
            ],
        ]);
        $request->merge([
            'pets_details' => json_encode($request->pets_details)
        ]);
        DeliveryPet::create($request->only([ 
            'from_city', 'to_city', 'date',
            'note', 'name', 'email', 'phone',
            'pets_details',
        ]));

        toast(trans('frontend.toast.success'),'success');
        return redirect()->back(); 
    } 
}
