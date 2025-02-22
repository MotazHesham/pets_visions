<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller; 
use App\Models\AdoptionPet; 
use Illuminate\Http\Request; 

class AdoptionPetsController extends Controller
{ 

    public function adoptions()
    { 
        $adoptionPets = AdoptionPet::with(['user', 'pet_type', 'media'])->paginate(12);

        return view('frontend.adoptions.adoptions', compact('adoptionPets'));
    } 
}
