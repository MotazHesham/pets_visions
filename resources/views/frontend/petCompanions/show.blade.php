@extends('layouts.frontend')

@section('content')
    <!-- breadcrumb start -->
    <div class="breadcrumb-main ">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-contain">
                        <div>
                            <h2>{{ $petCompanion->user->name ?? '' }}</h2>
                            <ul>
                                <li><a href="{{ route('frontend.home') }}">{{ trans('frontend.pet_companion.home') }}</a></li>
                                <li><i class="fa fa-angle-double-left"></i></li>
                                <li><a href="{{ route('frontend.pet-companions') }}">{{ trans('frontend.pet_companion.companions') }}</a></li>
                                <li><i class="fa fa-angle-double-left"></i></li>
                                <li><a href="javascript:void(0)">{{ $petCompanion->user->name ?? '' ?? '' }}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->
    <!-- section start -->
    <section class="section-big-pt-space ratio_asos b-g-light">
        <div class="collection-wrapper">
            <div class="custom-container">
                <div class="row">
                    <div class="collection-content col">
                        <div class="page-main-content">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="top-banner-wrapper"> 
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="shop-logo">
                                                    <img src="{{ $petCompanion->photo ? $petCompanion->photo->getUrl() : '' }}" class="img-fluid">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="top-banner-content small-section">

                                                    <h4>{{ $petCompanion->user->name ?? '' }}</h4>
                                                    
                                                    @includeIf('frontend.partials.rating', ['rating' => $petCompanion->rating])

                                                    {{ $petCompanion->user->phone ?? '' }}

                                                </div>
                                                <a class="btn btn-rounded tooltip-top" href="{{ $petCompanion->affiliation_link }}" target="_blank">
                                                    {{ trans('frontend.pet_companion.request_compaion') }}
                                                </a>
                                            </div>
                                            <div class="col-md-5">

                                                <div class="shop_btn">  
                                                    <a href="{{ route('frontend.pet-companion-reviews',$petCompanion->id) }}" class=" btn btn-rounded tooltip-top">
                                                        {{ trans('frontend.pet_companion.rate') }}
                                                    </a>
                                                </div>

                                            </div>
                                        </div>
                                    </div> 
                                </div>
                            </div>
                            <div class="row">
                                <div class="wpb_wrapper">
                                    <h3 class="mt-4">{{ trans('frontend.pet_companion.experience') }}</h3> 
                                    <p class="p-4">{!! $petCompanion->experience !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- Section ends --> 
@endsection
