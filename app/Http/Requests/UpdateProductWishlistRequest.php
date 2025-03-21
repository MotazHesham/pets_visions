<?php

namespace App\Http\Requests;

use App\Models\ProductWishlist;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateProductWishlistRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('product_wishlist_edit');
    }

    public function rules()
    {
        return [];
    }
}
