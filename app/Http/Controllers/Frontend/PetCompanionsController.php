<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller; 
use App\Models\PetCompanion; 
use Illuminate\Http\Request; 

class PetCompanionsController extends Controller
{ 

    public function pet_companions()
    { 
        $petCompanions = PetCompanion::with(['user', 'media']);

        if(getFromRequest('search')){
            $petCompanions = $petCompanions->whereHas('user',function($q){
                $q->where('name','like','%'.getFromRequest('search').'%');
            });
        }

        $petCompanions = $petCompanions->paginate(12);

        return view('frontend.petCompanions.pet-companions', compact('petCompanions'));
    }

    public function show($id){
        $petCompanion = PetCompanion::with(['user', 'media'])->findOrFail($id);
        return view('frontend.petCompanions.show', compact('petCompanion'));
    }
}
