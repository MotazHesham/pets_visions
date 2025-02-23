@extends('layouts.frontend')

@section('content')
    <!-- breadcrumb start -->
    <div class="breadcrumb-main ">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-contain">
                        <div>
                            <h2>{{ trans('frontend.dashboard.dashboard') }}</h2>
                            <ul>
                                <li><a href="{{ route('frontend.home') }}">{{ trans('frontend.dashboard.home') }}</a></li>
                                <li><i class="fa fa-angle-double-left"></i></li>
                                <li><a href="javascript:void(0)">{{ trans('frontend.dashboard.dashboard') }}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->

    <section class="section-big-py-space b-g-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="account-sidebar"><a class="popup-btn">{{ trans('frontend.dashboard.my_account') }}</a></div>
                    <div class="dashboard-left">
                        <div class="collection-mobile-back"><span class="filter-back"><i class="fa fa-angle-left"
                                    aria-hidden="true"></i> {{ trans('frontend.dashboard.back') }}</span></div>
                        <div class="block-content ">
                            <ul>
                                <li><a href="{{ route('frontend.dashboard.home') }}">{{ trans('frontend.dashboard.menu.main') }}
                                    </a></li>
                                <li><a
                                        href="{{ route('frontend.dashboard.info') }}">{{ trans('frontend.dashboard.menu.account_details') }}</a>
                                </li>
                                <li><a
                                        href="{{ route('frontend.dashboard.my-pets') }}">{{ trans('frontend.dashboard.menu.my_pets') }}</a>
                                </li>
                                <li class="active"><a
                                        href="{{ route('frontend.dashboard.wishlists') }}">{{ trans('frontend.dashboard.menu.favs') }}</a>
                                </li>
                                <li><a
                                        href="{{ route('frontend.dashboard.profile-edit') }}">{{ trans('frontend.dashboard.menu.account') }}</a>
                                </li>
                                <li class="last"><a href="javascript:void(0)"
                                        onclick="event.preventDefault(); document.getElementById('logoutform').submit();">{{ trans('frontend.dashboard.menu.logout') }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="dashboard-right">
                        <div class="dashboard">

                            <section class="wishlist-section section-big-py-space b-g-light">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table class="table cart-table table-responsive-xs">
                                                <thead>
                                                    <tr class="table-head">
                                                        <th scope="col">{{ trans('frontend.dashboard.wishlist.photo') }}</th>
                                                        <th scope="col">{{ trans('frontend.dashboard.wishlist.name') }}</th>
                                                        <th scope="col">{{ trans('frontend.dashboard.wishlist.price') }}</th> 
                                                        <th scope="col"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($productWishlists as $wishlist)
                                                        @php
                                                            $product = $wishlist->product;
                                                        @endphp
                                                        @if($product)
                                                            <tr>
                                                                <td>
                                                                    <a href="{{ route('frontend.products.show',['slug' => $product->slug, 'name' => $product->nonSpaceName()]) }}">
                                                                        <img src="{{ $product->main_photo ? $product->main_photo->getUrl('preview') : '' }}"
                                                                            alt="product" class="img-fluid  "></a>
                                                                </td>
                                                                <td>
                                                                    <a href="{{ route('frontend.products.show',['slug' => $product->slug, 'name' => $product->nonSpaceName()]) }}">{{ $product->name }}</a>
                                                                    <div class="mobile-cart-content"> 
                                                                        <div class="col-xs-3">
                                                                            <h2 class="td-color">{{ $product->price }} {{ currency_symbol() }}</h2>
                                                                        </div>
                                                                        <div class="col-xs-3">
                                                                            <h2 class="td-color"><a href="{{ route('frontend.dashboard.wishlists.update_or_create',$product->id) }}"
                                                                                    class="icon me-1"><i class="ti-close"></i>
                                                                                </a> </h2>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <h2>{{ $product->price }} {{ currency_symbol() }}</h2>
                                                                </td> 
                                                                <td>
                                                                    <a href="{{ route('frontend.dashboard.wishlists.update_or_create',$product->id) }}" class="icon me-3">
                                                                        <i class="ti-close"></i> 
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                </tbody> 
                                            </table>
                                            {{ $productWishlists->links() }}
                                        </div>
                                    </div>
                                    <div class="row wishlist-buttons">
                                        <div class="col-12">
                                            <a href="{{ route('frontend.products.search') }}" class="btn btn-normal">   
                                                {{ trans('frontend.dashboard.continue_shopping') }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </section>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
