<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller; 
use App\Models\Clinic; 
use Illuminate\Http\Request; 

class ClinicsController extends Controller
{
    public function clinics(){ 
        $clinics = Clinic::whereHas('user' , function($q){
                                return $q->where('approved' , 1);
                            })->orderBy('created_at','desc');
        if(getFromRequest('search')){
            $clinics = $clinics->where('clinic_name','LIKE','%'.getFromRequest('search').'%');
        }
        $clinics = $clinics->paginate(8);
        return view('frontend.clinics.clinics', compact('clinics'));
    }
    
    public function show($id){
        $clinic = Clinic::findOrFail($id);
        if(!$clinic->user->approved){
            toast(trans('frontend.notApproved'),'warning');
            return redirect()->route('frontend.home');
        }
        return view('frontend.clinics.show', compact('clinic'));
    }
}
