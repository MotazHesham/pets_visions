@extends('layouts.frontend')

@section('content')
    <!-- breadcrumb start -->
    <div class="breadcrumb-main ">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-contain">
                        <div>
                            <h2>{{ $clinicService->name }}</h2>
                            <ul>
                                <li><a href="{{ route('frontend.home') }}">{{ trans('frontend.clinic.home') }}</a></li>
                                <li><i class="fa fa-angle-double-left"></i></li>
                                <li><a href="{{ route('frontend.clinics.show',$clinicService->clinic_id) }}">{{ $clinicService->clinic->clinic_name ?? '' }}</a></li>
                                <li><i class="fa fa-angle-double-left"></i></li>
                                <li><a href="javascript:void(0)">{{ $clinicService->name }}</a></li>
                            </ul> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->
    <!-- section start -->
    <section class="about-page section-big-py-space">
        <div class="custom-container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="banner-section"><img src="{{ $clinicService->banner ? $clinicService->banner->getUrl() : '' }}" onerror="this.onerror=null;this.src='{{ asset('no-image.png') }}';" class="img-fluid   " alt="">
                    </div>
                </div>
                <div class="col-lg-6">
                    <h4>{{ $clinicService->name }}</h4>
                    
                    <br />
                    <p class="mb-2">
                        {!! $clinicService->description !!}
                    </p> 

                    <br />
                    <br />
                    <div class="col-sm-3 text-center">
                        <a href="{{ $clinicService->affiliation_link }}" target="_blanc" class="btn btn-normal" data-tippy-content="">
                            {{ trans('frontend.clinic.reservation') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Section ends -->
@endsection
