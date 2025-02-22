<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Hosting;
use App\Models\HostingReview;
use Illuminate\Http\Request; 

class HostingReviewsController extends Controller
{ 

    public function index($id)
    {  
        $hosting = Hosting::findOrFail($id);
        $reviews = HostingReview::where('hosting_id',$id)->with(['hosting', 'user'])->paginate(12);

        return view('frontend.hostings.review', compact('reviews','hosting'));
    }  

    public function store(Request $request)
    {
        $request->validate([
            'rate' => 'required|numeric|between:1,5',
            'comment' => 'required|string|max:25',
            'name' => 'required|string|max:25',
            'hosting_id' => 'required|integer|exists:hostings,id',
        ]);   
        if(auth()->check()){
            $request->merge([
                'user_id' => auth()->user()->id
            ]);
        }
        HostingReview::create($request->only('rate','comment','name','hosting_id','user_id'));

        toast(trans('frontend.toast.success'),'success');
        return redirect()->back(); 
    } 
}
