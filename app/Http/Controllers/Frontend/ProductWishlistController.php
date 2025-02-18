<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ProductWishlist;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductWishlistController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('product_wishlist_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $productWishlists = ProductWishlist::with(['user', 'product'])->get();

        return view('frontend.productWishlists.index', compact('productWishlists'));
    }
}
