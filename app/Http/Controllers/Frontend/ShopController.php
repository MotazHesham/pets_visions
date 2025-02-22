<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Store;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function shops(){
        $shops = Store::orderBy('created_at','desc');
        if(getFromRequest('search')){
            $shops = $shops->where('store_name','LIKE','%'.getFromRequest('search').'%');perPage: 
        }
        $shops = $shops->paginate(8);
        return view('frontend.shops.shops',compact('shops'));
    }

    public function show($id){  
        $from_price = null;
        $to_price = null;

        $categories = ProductCategory::get();
        $shop = Store::findOrFail($id); 
        $products = Product::with('store')
                            ->where('published',1)
                            ->where('store_id',$shop->id);

        if(getFromRequest('search')){
            $products = $products->where('name','LIKE','%'.getFromRequest('search').'%');
        }

        if(getFromRequest('price_range')){
            $price_range = explode(';',getFromRequest('price_range'));
            $from_price = $price_range[0];
            $to_price = $price_range[1];
            $products = $products->whereBetween('price',[$from_price,$to_price]);
        }
        if(getFromRequest('categories') && is_array(getFromRequest('categories'))){
            $products = $products->whereIn('category_id',array_keys(getFromRequest('categories')));
        } 
        $min_price = $products->min('price');
        $max_price = $products->max('price');
        $products = $products->orderBy('created_at','desc')
                            ->paginate(getFromRequest('per_page',12));
        return view('frontend.shops.shop',compact('shop','products','categories','min_price','max_price','from_price','to_price'));
    } 
}
