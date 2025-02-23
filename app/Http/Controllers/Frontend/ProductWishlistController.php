<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductWishlist; 

class ProductWishlistController extends Controller
{
    public function wishlists()
    { 
        $productWishlists = ProductWishlist::with(['user', 'product.media'])->paginate(12);

        return view('frontend.dashboard.wishlists', compact('productWishlists'));
    }

    public function update_or_create($id){
        $product = Product::findOrFail($id);
        $productWishlsit = ProductWishlist::where('user_id',auth()->user()->id)->where('product_id',$id)->first();

        if($productWishlsit){
            $productWishlsit->delete();
        }else{
            $productWishlsit = new ProductWishlist();
            $productWishlsit->user_id = auth()->user()->id;
            $productWishlsit->product_id = $id;
            $productWishlsit->save();
        }
        
        toast(trans('frontend.toast.success'),'success');
        return redirect()->back();
    } 
}
