@extends('layouts.frontend')
@section('content') 

    <div class="breadcrumb-main ">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-contain">
                        <div>
                            <h2>
                                {{ trans('frontend.about.about') }} 
                            </h2>
                            <ul>
                                <li><a href="{{ route('frontend.home') }}">{{ trans('frontend.about.home')  }}</a></li>
                                <li><i class="fa fa-angle-double-left"></i></li>
                                <li><a href="javascript:void(0)">    {{ trans('frontend.about.about')  }} </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <section class="about-page section-big-py-space">
        <div class="custom-container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="banner-section"><img src="{{ asset(get_setting('about')) }}" class="img-fluid   w-100"
                            alt="">
                    </div>
                </div>
                <div class="col-lg-6">
                    <h2>{{ trans('frontend.about.about')  }}</h2>
                    {!! get_setting('description_2') !!}
                </div>
            </div>
        </div>
    </section>
@endsection
