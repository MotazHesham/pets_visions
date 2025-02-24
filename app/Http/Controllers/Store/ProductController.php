<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyProductRequest;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Store;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{
    use MediaUploadingTrait;

    public function update_statuses(Request $request){ 
        $type = $request->type;
        $product = Product::findOrFail($request->id);
        $product->$type = $request->status; 
        $product->save();
        return 1;
    }
    public function index(Request $request)
    { 
        if ($request->ajax()) {
            $query = Product::with(['category', 'user', 'store'])
                                ->where('store_id',currentStore()->id)
                                ->select(sprintf('%s.*', (new Product)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = true;
                $editGate      = true;
                $deleteGate    = true;
                $crudRoutePart = 'store.products';

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
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('current_stock', function ($row) {
                return $row->current_stock ? $row->current_stock : '';
            });
            $table->editColumn('price', function ($row) {
                return $row->price ? $row->price : '';
            });
            $table->editColumn('show_in_website', function ($row) {
                return '<a href="'.route('frontend.products.show',['slug' => $row->slug, 'name' => $row->nonSpaceName()]).'">' . trans('global.show') . '</a>';
            });
            $table->editColumn('main_photo', function ($row) {
                if ($photo = $row->main_photo) {
                    return sprintf(
                        '<a href="%s" target="_blank"><img src="%s" width="50px" height="50px"></a>',
                        $photo->url,
                        $photo->thumbnail
                    );
                }

                return '';
            });
            $table->editColumn('tags', function ($row) {
                return $row->tags ? $row->tags : '';
            });
            $table->editColumn('published', function ($row) {
                return '<label class="c-switch c-switch-pill c-switch-success">
                            <input onchange="update_statuses(this,\'published\')" value="'. $row->id .'" type="checkbox" class="c-switch-input" '. ($row->published ? "checked" : null) .' >
                            <span class="c-switch-slider"></span>
                        </label>' ;
            }); 
            $table->editColumn('featured', function ($row) {
                return '<label class="c-switch c-switch-pill c-switch-success">
                            <input onchange="update_statuses(this,\'featured\')" value="'. $row->id .'" type="checkbox" class="c-switch-input" '. ($row->featured ? "checked" : null) .' >
                            <span class="c-switch-slider"></span>
                        </label>' ;
            });
            $table->addColumn('category_name', function ($row) {
                return $row->category ? $row->category->name : '';
            });

            $table->addColumn('user_name', function ($row) {
                return $row->user ? $row->user->name : '';
            });

            $table->addColumn('store_store_name', function ($row) {
                return $row->store ? $row->store->store_name : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'main_photo', 'published', 'featured', 'category', 'user', 'store','show_in_website']);

            return $table->make(true);
        }

        return view('store.products.index');
    }

    public function create()
    { 
        $categories = ProductCategory::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $stores = Store::pluck('store_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('store.products.create', compact('categories', 'stores', 'users'));
    }

    public function store(StoreProductRequest $request)
    {
        $validated_request = $request->all();
        $validated_request['slug'] = Str::slug($request->name, '-',null) . '-' . Str::random(7);
        $validated_request['tags'] = implode('|',$request->tags);
        $validated_request['added_by'] = 'store';
        $validated_request['user_id'] = auth()->id();
        $product = Product::create($validated_request); 

        if ($request->input('main_photo', false)) {
            $product->addMedia(storage_path('tmp/uploads/' . basename($request->input('main_photo'))))->toMediaCollection('main_photo');
        }

        foreach ($request->input('photos', []) as $file) {
            $product->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('photos');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $product->id]);
        }

        return redirect()->route('store.products.index');
    }

    public function edit(Product $product)
    { 
        $categories = ProductCategory::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $stores = Store::pluck('store_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $product->load('category', 'user', 'store');

        return view('store.products.edit', compact('categories', 'product', 'stores', 'users'));
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $validated_request = $request->all(); 
        $validated_request['tags'] = implode('|',$request->tags);  
        $product->update($validated_request);

        if ($request->input('main_photo', false)) {
            if (! $product->main_photo || $request->input('main_photo') !== $product->main_photo->file_name) {
                if ($product->main_photo) {
                    $product->main_photo->delete();
                }
                $product->addMedia(storage_path('tmp/uploads/' . basename($request->input('main_photo'))))->toMediaCollection('main_photo');
            }
        } elseif ($product->main_photo) {
            $product->main_photo->delete();
        }

        if (count($product->photos) > 0) {
            foreach ($product->photos as $media) {
                if (! in_array($media->file_name, $request->input('photos', []))) {
                    $media->delete();
                }
            }
        }
        $media = $product->photos->pluck('file_name')->toArray();
        foreach ($request->input('photos', []) as $file) {
            if (count($media) === 0 || ! in_array($file, $media)) {
                $product->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('photos');
            }
        }

        return redirect()->route('store.products.index');
    }

    public function show(Product $product)
    { 
        $product->load('category', 'user', 'store', 'productProductReviews');

        return view('store.products.show', compact('product'));
    }

    public function destroy(Product $product)
    { 
        $product->delete();

        return back();
    }

    public function massDestroy(MassDestroyProductRequest $request)
    {
        $products = Product::find(request('ids'));

        foreach ($products as $product) {
            $product->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    { 
        $model         = new Product();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
