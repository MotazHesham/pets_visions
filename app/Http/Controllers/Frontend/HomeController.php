<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Clinic;
use App\Models\Paramedic;
use App\Models\PetType;
use App\Models\ProductCategory;
use App\Models\Slider;

class HomeController
{
    public function index()
    {
        $sliders = Slider::orderBy("created_at","desc")->where('publish',true)->get();
        $types = PetType::orderBy('created_at','desc')->get();
        $categories = ProductCategory::orderBy('created_at','desc')->take(5)->get(); 
        $clinics = Clinic::orderBy('created_at','desc')
                        ->whereHas('user' , function($q){
                            return $q->where('approved' , 1);
                        })->take(12)->get();
        return view("frontend.home",compact("sliders","types","categories","clinics"));
    }

    public function firstaids(){
        $paramedics = Paramedic::where('active',1)->get();
        return view("frontend.firstaids",compact('paramedics'));
    }

    public function about(){
        return view("frontend.about");
    }
}
