<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;  
use App\Models\ProductReview; 
use Illuminate\Http\Request; 

class ProductReviewsController extends Controller
{ 

    public function store(Request $request)
    {
        $request->validate([
            'rate' => 'required|numeric|between:1,5',
            'comment' => 'required|string|max:25',
            'name' => 'required|string|max:25',
            'product_id' => 'required|integer|exists:products,id',
        ]);   
        if(auth()->check()){
            $request->merge([
                'user_id' => auth()->user()->id
            ]);
        }
        ProductReview::create($request->only('rate','comment','name','product_id','user_id'));

        toast(trans('frontend.toast.success'),'success');
        return redirect()->back();
    } 
}
