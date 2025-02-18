<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyProductReviewRequest;
use App\Http\Requests\StoreProductReviewRequest;
use App\Http\Requests\UpdateProductReviewRequest;
use App\Models\Product;
use App\Models\ProductReview;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductReviewsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('product_review_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $productReviews = ProductReview::with(['product', 'user'])->get();

        return view('frontend.productReviews.index', compact('productReviews'));
    }

    public function create()
    {
        abort_if(Gate::denies('product_review_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.productReviews.create', compact('products', 'users'));
    }

    public function store(StoreProductReviewRequest $request)
    {
        $productReview = ProductReview::create($request->all());

        return redirect()->route('frontend.product-reviews.index');
    }

    public function edit(ProductReview $productReview)
    {
        abort_if(Gate::denies('product_review_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $productReview->load('product', 'user');

        return view('frontend.productReviews.edit', compact('productReview', 'products', 'users'));
    }

    public function update(UpdateProductReviewRequest $request, ProductReview $productReview)
    {
        $productReview->update($request->all());

        return redirect()->route('frontend.product-reviews.index');
    }

    public function show(ProductReview $productReview)
    {
        abort_if(Gate::denies('product_review_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $productReview->load('product', 'user');

        return view('frontend.productReviews.show', compact('productReview'));
    }

    public function destroy(ProductReview $productReview)
    {
        abort_if(Gate::denies('product_review_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $productReview->delete();

        return back();
    }

    public function massDestroy(MassDestroyProductReviewRequest $request)
    {
        $productReviews = ProductReview::find(request('ids'));

        foreach ($productReviews as $productReview) {
            $productReview->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
