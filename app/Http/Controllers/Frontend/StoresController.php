<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyStoreRequest;
use App\Http\Requests\StoreStoreRequest;
use App\Http\Requests\UpdateStoreRequest;
use App\Models\PetType;
use App\Models\Store;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class StoresController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('store_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $stores = Store::with(['user', 'specializations', 'media'])->get();

        return view('frontend.stores.index', compact('stores'));
    }

    public function create()
    {
        abort_if(Gate::denies('store_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $specializations = PetType::pluck('name', 'id');

        return view('frontend.stores.create', compact('specializations', 'users'));
    }

    public function store(StoreStoreRequest $request)
    {
        $store = Store::create($request->all());
        $store->specializations()->sync($request->input('specializations', []));
        if ($request->input('logo', false)) {
            $store->addMedia(storage_path('tmp/uploads/' . basename($request->input('logo'))))->toMediaCollection('logo');
        }

        if ($request->input('cover', false)) {
            $store->addMedia(storage_path('tmp/uploads/' . basename($request->input('cover'))))->toMediaCollection('cover');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $store->id]);
        }

        return redirect()->route('frontend.stores.index');
    }

    public function edit(Store $store)
    {
        abort_if(Gate::denies('store_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $specializations = PetType::pluck('name', 'id');

        $store->load('user', 'specializations');

        return view('frontend.stores.edit', compact('specializations', 'store', 'users'));
    }

    public function update(UpdateStoreRequest $request, Store $store)
    {
        $store->update($request->all());
        $store->specializations()->sync($request->input('specializations', []));
        if ($request->input('logo', false)) {
            if (! $store->logo || $request->input('logo') !== $store->logo->file_name) {
                if ($store->logo) {
                    $store->logo->delete();
                }
                $store->addMedia(storage_path('tmp/uploads/' . basename($request->input('logo'))))->toMediaCollection('logo');
            }
        } elseif ($store->logo) {
            $store->logo->delete();
        }

        if ($request->input('cover', false)) {
            if (! $store->cover || $request->input('cover') !== $store->cover->file_name) {
                if ($store->cover) {
                    $store->cover->delete();
                }
                $store->addMedia(storage_path('tmp/uploads/' . basename($request->input('cover'))))->toMediaCollection('cover');
            }
        } elseif ($store->cover) {
            $store->cover->delete();
        }

        return redirect()->route('frontend.stores.index');
    }

    public function show(Store $store)
    {
        abort_if(Gate::denies('store_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $store->load('user', 'specializations', 'storeProducts');

        return view('frontend.stores.show', compact('store'));
    }

    public function destroy(Store $store)
    {
        abort_if(Gate::denies('store_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $store->delete();

        return back();
    }

    public function massDestroy(MassDestroyStoreRequest $request)
    {
        $stores = Store::find(request('ids'));

        foreach ($stores as $store) {
            $store->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('store_create') && Gate::denies('store_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Store();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
