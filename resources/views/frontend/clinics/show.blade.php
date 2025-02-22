@extends('layouts.frontend')

@section('content')
    <!-- breadcrumb start -->
    <div class="breadcrumb-main ">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-contain">
                        <div>
                            <h2>{{ $clinic->clinic_name }}</h2>
                            <ul>
                                <li><a href="{{ route('frontend.home') }}">{{ trans('frontend.clinic.home') }}</a></li>
                                <li><i class="fa fa-angle-double-left"></i></li>
                                <li><a href="{{ route('frontend.clinics') }}">{{ trans('frontend.clinic.clinics') }}</a></li>
                                <li><i class="fa fa-angle-double-left"></i></li>
                                <li><a href="javascript:void(0)">{{ $clinic->clinic_name ?? '' }}</a></li>
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
                                        <a href="#"><img src="{{ $clinic->cover ? $clinic->cover->getUrl() : '' }}" onerror="this.onerror=null;this.src='{{ asset('no-image.png') }}';" class="img-fluid "
                                                alt=""></a>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="shop-logo">
                                                    <img src="{{ $clinic->logo ? $clinic->logo->getUrl() : '' }}" class="img-fluid">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="top-banner-content small-section">

                                                    <h4>{{ $clinic->clinic_name }}</h4>
                                                    
                                                    @includeIf('frontend.partials.rating', ['rating' => $clinic->rating])


                                                    <ul>
                                                        <li>
                                                            {{ $clinic->address }}
                                                        </li>
                                                    </ul>
                                                    {{ $clinic->clinic_phone }}

                                                </div>
                                            </div>
                                            <div class="col-md-5">

                                                <div class="shop_btn"> 

                                                    <a href="{{ route('frontend.clinic-reviews',$clinic->id) }}" class=" btn btn-rounded tooltip-top">
                                                        {{ trans('frontend.clinic.rate') }}
                                                    </a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>


                                    <section class="about-page section-big-py-space">
                                        <div class="custom-container">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="banner-section">
                                                        <img src="{{ $clinic->about_us_image ? $clinic->about_us_image->getUrl() : '' }}"
                                                            onerror="this.onerror=null;this.src='{{ asset('no-image.png') }}';"
                                                            class="img-fluid   w-100" alt=""></div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <h4>{{ trans('frontend.clinic.aboutus') }}</h4> 
                                                    <p>
                                                        {!! $clinic->about_us !!}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </section>


                                    <!--title start-->
                                    <div class="title6 ">
                                        <h4>{{ trans('frontend.review.services') }}</h4>
                                    </div>
                                    <!--title end-->
                                    <!-- services start -->
                                    <section class="services1  block style2   border-services section-big-mb-space">
                                        <div class="custom-container">
                                            <div class="row service-block">
                                                <div class="col-12 ">
                                                    <div class="row ">
                                                        
                                                        @foreach($clinic->clinicClinicServices as $service)
                                                            <div class="col-md-3  ">
                                                                <div class="services-box  mb-2">
                                                                    <div class="media">
                                                                        <div class="icon-wrraper">
                                                                            <img src="{{ $service->photo ? $service->photo->getUrl() : '' }}"
                                                                                width="70" />
                                                                        </div>
                                                                        <div class="media-body">
                                                                            <h4>
                                                                                {{ $service->name }}
                                                                            </h4>
                                                                            <p>{{ $service->short_description }}</p>
                                                                            <a href="{{ route('frontend.clinic-services.show',$service->id) }}"
                                                                                class="btn">{{ trans('frontend.review.more') }}</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                    <!-- services end --> 

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
