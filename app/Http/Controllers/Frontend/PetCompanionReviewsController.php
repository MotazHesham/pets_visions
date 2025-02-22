<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPetCompanionReviewRequest;
use App\Http\Requests\StorePetCompanionReviewRequest;
use App\Http\Requests\UpdatePetCompanionReviewRequest;
use App\Models\PetCompanion;
use App\Models\PetCompanionReview;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PetCompanionReviewsController extends Controller
{

    public function index($id)
    {  
        $petCompanion = PetCompanion::findOrFail($id);
        $reviews = PetCompanionReview::where('pet_companion_id',$id)->with(['pet_companion', 'user'])->paginate(12);

        return view('frontend.petCompanions.review', compact('reviews','petCompanion'));
    }  

    public function store(Request $request)
    {
        $request->validate([
            'rate' => 'required|numeric|between:1,5',
            'comment' => 'required|string|max:25',
            'name' => 'required|string|max:25',
            'pet_companion_id' => 'required|integer|exists:pet_companions,id',
        ]);   
        if(auth()->check()){
            $request->merge([
                'user_id' => auth()->user()->id
            ]);
        }
        PetCompanionReview::create($request->only('rate','comment','name','pet_companion_id','user_id'));

        toast(trans('frontend.toast.success'),'success');
        return redirect()->back(); 
    }  
}
