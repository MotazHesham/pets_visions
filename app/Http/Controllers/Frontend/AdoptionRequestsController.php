<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller; 
use App\Models\AdoptionPet;
use App\Models\AdoptionRequest; 
use Illuminate\Http\Request; 

class AdoptionRequestsController extends Controller
{ 

    public function create($id)
    { 
        $adoptionPet = AdoptionPet::findOrFail($id);
        return view('frontend.adoptions.request',compact('adoptionPet'));
    }

    public function store(Request $request)
    {
        $request->validate([
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
                'string',
                'required',
                'max:255'
            ],
            'address' => [
                'string',
                'required',
                'max:255'
            ],
            'adoption_pet_id' => [
                'required',
                'integer',
                'exists:adoption_pets,id'
            ],
        ]);
        AdoptionRequest::create($request->only([ 
            'first_name','last_name','phone','email',
            'gender','age','address','experience','note',
            'adoption_pet_id',
        ]));

        toast(trans('frontend.toast.success'),'success');
        return redirect()->back(); 
    }

}
