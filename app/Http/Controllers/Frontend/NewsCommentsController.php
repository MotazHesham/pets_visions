<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\NewsComment;
use Illuminate\Http\Request; 

class NewsCommentsController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'news_id' => 'required|integer|exists:newss,id',
            'name' => 'required|string|max:255',
            'comment' => 'required|max:255',
        ]);

        NewsComment::create($request->only(['news_id','name','comment']));

        toast(trans('frontend.toast.success'),'success');
        return redirect()->back(); 
    }
}
