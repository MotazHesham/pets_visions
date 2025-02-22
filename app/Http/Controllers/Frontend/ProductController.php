<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait; 
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductReview;

class ProductController extends Controller
{
    use MediaUploadingTrait;
    
    public function search(){ 
        $from_price = null;
        $to_price = null;

        $categories = ProductCategory::get(); 
        $products = Product::with('store')
                            ->where('published',1);

        if(getFromRequest('search')){
            $products = $products->where('name','LIKE','%'.getFromRequest('search').'%');
        }

        if(getFromRequest('price_range')){
            $price_range = explode(';',getFromRequest('price_range'));
            $from_price = $price_range[0];
            $to_price = $price_range[1];
            $products = $products->whereBetween('price',[$from_price,$to_price]);
        }
        if(getFromRequest('category_id')){
            $products = $products->where('category_id',getFromRequest('category_id'));
            request()->merge([
                'categories' => [
                    getFromRequest('category_id') => 'on'
                ]
            ]);
        } 
        if(getFromRequest('categories') && is_array(getFromRequest('categories'))){
            $products = $products->whereIn('category_id',array_keys(getFromRequest('categories')));
        } 
        $min_price = $products->min('price');
        $max_price = $products->max('price');
        $products = $products->orderBy('created_at','desc')
                            ->paginate(getFromRequest('per_page',12));
        return view('frontend.shops.products',compact('products','categories','min_price','max_price','from_price','to_price'));
    }

    public function show($slug){
        $product = Product::where('slug',$slug)->firstOrFail();
        $newProducts = Product::where('id','!=',$product->id)
                                ->select('id','slug','rating','name','price')
                                ->orderBy('created_at','desc')
                                ->take(12)->get()->chunk(4); 
        $similarProducts = Product::where('id','!=',$product->id) 
                                ->with('store')
                                ->where('category_id',$product->category_id)
                                ->orderBy('created_at','desc')
                                ->take(12)->get(); 
        $reviews = ProductReview::where('product_id',$product->id)->orderBy('created_at','asc')->take(30)->get();
        return view('frontend.shops.product',compact('product','newProducts','similarProducts','reviews'));
    }
}
