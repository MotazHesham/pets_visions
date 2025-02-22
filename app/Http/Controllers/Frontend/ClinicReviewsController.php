<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyClinicReviewRequest;
use App\Http\Requests\StoreClinicReviewRequest;
use App\Http\Requests\UpdateClinicReviewRequest;
use App\Models\Clinic;
use App\Models\ClinicReview;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ClinicReviewsController extends Controller
{
    public function index($id)
    {  
        $clinic = Clinic::findOrFail($id);
        $reviews = ClinicReview::where('clinic_id',$id)->with(['clinic', 'user'])->paginate(12);

        return view('frontend.clinics.review', compact('reviews','clinic'));
    }  

    public function store(Request $request)
    {
        $request->validate([
            'rate' => 'required|numeric|between:1,5',
            'comment' => 'required|string|max:25',
            'name' => 'required|string|max:25',
            'clinic_id' => 'required|integer|exists:clinics,id',
        ]);   
        if(auth()->check()){
            $request->merge([
                'user_id' => auth()->user()->id
            ]);
        }
        ClinicReview::create($request->only('rate','comment','name','clinic_id','user_id'));

        toast(trans('frontend.toast.success'),'success');
        return redirect()->back(); 
    }  
}
