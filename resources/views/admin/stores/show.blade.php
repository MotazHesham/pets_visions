@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.store.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.stores.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.store.fields.id') }}
                        </th>
                        <td>
                            {{ $store->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.store.fields.store_name') }}
                        </th>
                        <td>
                            {{ $store->store_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.store.fields.store_phone') }}
                        </th>
                        <td>
                            {{ $store->store_phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.store.fields.address') }}
                        </th>
                        <td>
                            {{ $store->address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.store.fields.domain') }}
                        </th>
                        <td>
                            {{ $store->domain }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.store.fields.logo') }}
                        </th>
                        <td>
                            @if($store->logo)
                                <a href="{{ $store->logo->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $store->logo->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.store.fields.cover') }}
                        </th>
                        <td>
                            @if($store->cover)
                                <a href="{{ $store->cover->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $store->cover->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.store.fields.user') }}
                        </th>
                        <td>
                            {{ $store->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.store.fields.specializations') }}
                        </th>
                        <td>
                            @foreach($store->specializations as $key => $specializations)
                                <span class="label label-info">{{ $specializations->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.stores.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#store_products" role="tab" data-toggle="tab">
                {{ trans('cruds.product.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="store_products">
            @includeIf('admin.stores.relationships.storeProducts', ['products' => $store->storeProducts])
        </div>
    </div>
</div>

@endsection