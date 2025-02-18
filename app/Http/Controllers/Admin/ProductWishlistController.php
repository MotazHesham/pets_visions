<?php

namespace App\Http\Controllers\Admin;

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

        return view('admin.productWishlists.index', compact('productWishlists'));
    }
}
