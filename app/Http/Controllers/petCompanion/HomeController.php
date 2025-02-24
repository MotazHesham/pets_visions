<?php

namespace App\Http\Controllers\petCompanion; 

class HomeController
{
    public function index()
    { 
        return view('petCompanion.home');
    }
}
