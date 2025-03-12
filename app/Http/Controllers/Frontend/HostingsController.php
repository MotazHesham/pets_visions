<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller; 
use App\Models\Hosting; 
use Illuminate\Http\Request; 

class HostingsController extends Controller
{ 
    public function hostings()
    {  
        $hostings = Hosting::whereHas('user' , function($q){
                                return $q->where('approved' , 1);
                            })->with(['user', 'hosting_services', 'media']);

        if(getFromRequest('search')){
            $hostings = $hostings->where('hosting_name', 'LIKE', '%' . getFromRequest('search') . '%'); 
        }
        $hostings = $hostings->paginate(12);

        return view('frontend.hostings.hostings', compact('hostings'));
    } 
    public function show($id)
    {  
        $hosting = Hosting::findOrFail($id);
        $hosting->load('user', 'hosting_services');

        return view('frontend.hostings.show', compact('hosting'));
    }
 
}
