<?php

namespace App\Http\Controllers\Store;

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
use Yajra\DataTables\Facades\DataTables;

class ProductReviewsController extends Controller
{
    public function index(Request $request)
    { 
        if ($request->ajax()) {
            $productIds = Product::where('store_id',currentStore()->id)->get()->pluck('id');
            $query = ProductReview::with(['product', 'user'])
                                    ->whereIn('product_id',$productIds)
                                    ->select(sprintf('%s.*', (new ProductReview)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = true;
                $editGate      = false;
                $deleteGate    = true;
                $crudRoutePart = 'store.product-reviews';

                return view('partials.datatablesActions_noauth', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->addColumn('product_name', function ($row) {
                return $row->product ? $row->product->name : '';
            });

            $table->addColumn('user_name', function ($row) {
                return $row->user ? $row->user->name : '';
            });

            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('rate', function ($row) {
                return $row->rate ? $row->rate : '';
            });
            $table->editColumn('comment', function ($row) {
                return $row->comment ? $row->comment : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'product', 'user']);

            return $table->make(true);
        }

        return view('store.productReviews.index');
    }

    public function create()
    {
        abort_if(Gate::denies('product_review_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('store.productReviews.create', compact('products', 'users'));
    }

    public function store(StoreProductReviewRequest $request)
    {
        $productReview = ProductReview::create($request->all());

        return redirect()->route('store.product-reviews.index');
    }

    public function edit(ProductReview $productReview)
    {
        abort_if(Gate::denies('product_review_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $productReview->load('product', 'user');

        return view('store.productReviews.edit', compact('productReview', 'products', 'users'));
    }

    public function update(UpdateProductReviewRequest $request, ProductReview $productReview)
    {
        $productReview->update($request->all());

        return redirect()->route('store.product-reviews.index');
    }

    public function show(ProductReview $productReview)
    {

        $productReview->load('product', 'user');

        return view('store.productReviews.show', compact('productReview'));
    }

    public function destroy(ProductReview $productReview)
    {

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
