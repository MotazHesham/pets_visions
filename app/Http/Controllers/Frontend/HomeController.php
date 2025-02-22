<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Clinic;
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
        $clinics = Clinic::orderBy('created_at','desc')->take(12)->get();
        return view("frontend.home",compact("sliders","types","categories","clinics"));
    }
}
