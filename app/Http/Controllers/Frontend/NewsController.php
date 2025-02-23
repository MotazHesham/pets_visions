<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller; 
use App\Models\News; 
use Illuminate\Http\Request; 

class NewsController extends Controller
{ 
    public function news() 
    {  
        $newss = News::with(['media','newsNewsComments'])
                        ->where('published',1)
                        ->orderBy('created_at','desc')
                        ->paginate(6);
        $latesNews = News::with(['media','newsNewsComments'])
                        ->where('published',1)
                        ->orderBy('updated_at','desc')
                        ->take(5)
                        ->get();
        $featuredNews = News::with(['media','newsNewsComments'])
                                ->where('published',1)
                                ->where('featured',1)
                                ->orderBy('created_at','desc')
                                ->take(5)
                                ->get();
        return view('frontend.news.news', compact('newss','latesNews','featuredNews'));
    }

    public function show($id)
    { 
        $news = News::findOrFail($id);
        return view('frontend.news.show', compact('news'));
    }
} 