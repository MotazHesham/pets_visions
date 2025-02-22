@extends('layouts.frontend')

@section('content')
    <!--header end-->
    <div class="breadcrumb-main ">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-contain">
                        <div>
                            <h2> {{ trans('frontend.hostings.title') }}</h2>
                            <ul>
                                <li><a href="{{ route('frontend.home') }}">{{ trans('frontend.hostings.home') }}</a></li> 
                                <li><i class="fa fa-angle-double-left"></i></li>
                                <li><a href="javascript:void(0)"> {{ trans('frontend.hostings.hosting') }} </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- footer start -->

    <section class="section-big-pt-space ratio_asos b-g-light">
        <div class="collection-wrapper">
            <div class="custom-container"> 
                <div class="row">
                    <div class="collection-content col">
                        <div class="page-main-content">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="top-banner-wrapper">
                                        <a href="#"><img src="{{ $hosting->cover ? $hosting->cover->getUrl() : '' }}"
                                            onerror="this.onerror=null;this.src='{{ asset('no-image.png') }}';" class="img-fluid "
                                                alt=""></a>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="shop-logo">
                                                    <img src="{{ $hosting->logo ? $hosting->logo->getUrl() : '' }}"
                                                    onerror="this.onerror=null;this.src='{{ asset('no-image.png') }}';" class="img-fluid" />
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="top-banner-content small-section">

                                                    <h4>{{ $hosting->hosting_name }}</h4>
                                                    
                                                    @include('frontend.partials.rating',['rating' => $hosting->rating])

                                                    <ul>
                                                        <li>
                                                            {{ $hosting->address }}
                                                        </li>
                                                    </ul>
                                                    {{ $hosting->hosting_phone }}

                                                </div>
                                            </div>
                                            <div class="col-md-5">

                                                <div class="shop_btn"> 
                                                    <a href="{{ route('frontend.hosting-reviews',$hosting->id) }}" class="btn btn-rounded tooltip-top">
                                                        {{ trans('frontend.hostings.rate') }}
                                                    </a>
                                                </div>

                                            </div>
                                        </div>
                                    </div> 
                                </div>
                            </div> 
                            <div class="row">
                                <div class="wpb_wrapper"> 
                                    {!! $hosting->about_us !!}
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- Our Project Start -->
    <section class="portfolio-section b-g-light portfolio-padding grid-portfolio section-big-pt-space  ratio2_3">
        <div class="container"> 
            <div class="row  zoom-gallery portfolio-2">
                @foreach($hosting->photos as $photo)
                    <div class="isotopeSelector filter fashion col-lg-3 col-sm-6">
                        <div class="overlay">
                            <div class="border-portfolio">
                                <a href="{{ $photo }}">
                                    <div class="overlay-background">
                                        <i class="ti-plus" aria-hidden="true"></i>
                                    </div>
                                    <img src="{{ $photo }}" onerror="this.onerror=null;this.src='{{ asset('no-image.png') }}';" class="img-fluid  bg-img" alt="portfolio">
                                </a>
                            </div>
                        </div>
                    </div> 
                @endforeach
            </div>
        </div>
    </section>
    <!-- Our Project End -->
    <section class="discount-banner b-g-light">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="discount-banner-contain p-0">

                        <div class="rounded-contain">
                            <a href="{{ $hosting->affiliation_link }}">
                                <div class="rounded-subcontain">
                                    {{ trans('frontend.hostings.request_service') }}
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
