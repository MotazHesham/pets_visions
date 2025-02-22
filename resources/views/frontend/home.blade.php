@extends('layouts.frontend')

@section('content')

    <ul id="demo1" style="direction:ltr;">
        @foreach ($sliders as $slider)
            <li>
                <img src="{{ $slider->image ? $slider->image->getUrl() : '' }}" /> 
                <div class="slide-desc">
                    <h2> {{ $slider->title }}</h2>
                    <h2>
                        {{ $slider->sub_title }}
                    </h2>
                </div>
            </li>
        @endforeach 
    </ul> 

    <section class="services1 section-big-py-space">
        <div class="container">

            <div class="row">
                <div class="title8  section-big-pt-space">
                    <h4>{{ trans('frontend.home.services') }}</h4>
                </div>

                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8 text-center"> 
                        {{ get_setting('services_text') }}
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="  col-md-3 col col-sm-6 ">
                    <div class="services-box">
                        <a href="{{ route('frontend.shops') }}">
                            <div class="media">
                                <img src="{{ asset('frontend/assets/images/services01.png') }}" />
                                <div class="media-body">
                                    <h4>{{ trans('frontend.home.stores') }} </h4>

                                </div>
                            </div>
                        </a>
                    </div>
                </div>



                <div class="col-md-3 col col-sm-6 ">
                    <div class="services-box">
                        <a href="{{ route('frontend.clinics') }}">
                            <div class="media">
                                <img src="{{ asset('frontend/assets/images/services05.png') }}" />
                                <div class="media-body">
                                    <h4>{{ trans('frontend.home.clinics') }} </h4>

                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-md-3 col col-sm-6 ">
                    <div class="services-box">
                        <a href="{{ route('frontend.firstaids') }}">
                            <div class="media">
                                <img src="{{ asset('frontend/assets/images/services03.png') }}" />
                                <div class="media-body">
                                    <h4>  {{ trans('frontend.home.firstaids') }} </h4>

                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-md-3 col col-sm-6 ">
                    <div class="services-box">
                        <a href="{{ route('frontend.hostings') }}">
                            <div class="media">
                                <img src="{{ asset('frontend/assets/images/services07.png') }}" />
                                <div class="media-body">
                                    <h4> {{ trans('frontend.home.hosting') }}</h4>

                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-md-3 col col-sm-6">
                    <div class="services-box">
                        <a href="{{ route('frontend.adoptions') }}">
                            <div class="media">
                                <img src="{{ asset('frontend/assets/images/services09.png') }}" />
                                <div class="media-body">
                                    <h4>{{ trans('frontend.home.adoption') }} </h4>

                                </div>
                            </div>
                        </a>
                    </div>
                </div>


                <div class=" col-md-3 col col-sm-6">
                    <div class="services-box">
                        <a href="{{ route('frontend.pet-companions') }}">
                            <div class="media">
                                <img src="{{ asset('frontend/assets/images/services10.png') }}" />
                                <div class="media-body">
                                    <h4> {{ trans('frontend.home.pet_companion') }} </h4>

                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-md-3 col col-sm-6">
                    <div class="services-box">
                        <a href="{{ route('frontend.stray-pets') }}">
                            <div class="media">
                                <img src="{{ asset('frontend/assets/images/services04.png') }}" />
                                <div class="media-body">
                                    <h4> {{ trans('frontend.home.stray') }}</h4>

                                </div>
                            </div>
                        </a>
                    </div>
                </div> 

                <div class="col-md-3 col col-sm-6">
                    <div class="services-box">
                        <a href="{{ route('frontend.delivery-pets') }}">
                            <div class="media">
                                <img src="{{ asset('frontend/assets/images/services08.png') }}" />
                                <div class="media-body">
                                    <h4>{{ trans('frontend.home.delivery') }} </h4>

                                </div>
                            </div>
                        </a>
                    </div>
                </div> 
            </div> 
        </div>

    </section>

    <section class="collection-banner b-g-white section-big-py-space ">
        <div class="container">
            <div class="row ">
                <div class="col-md-6">
                    <div class="home_banner_right ">

                        <div class="side_Cat">
                            <img src="{{ asset('frontend/assets/images/cat_bg.png') }}" />
                        </div>

                        <div class="side_form">
                            <h2 class="mb--10">{{ trans('frontend.home.stray_pets_text_1') }}</h2>
                            <br />
                            <div class="row">
                                <div class="col-md-12">
                                    <br> 
                                    <a class="btn btn-white" href="{{ route('frontend.stray-pets') }}">{{ trans('frontend.home.stray_pets_text_2') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="home_banner_left ">
                        <div class="home_banner_content ">
                            <h3>{{ trans('frontend.home.adoption_text_1') }}</h3> 
                            {{ trans('frontend.home.adoption_text_2') }} 
                            <a class="btn btn-dark" href="{{ route('frontend.adoptions') }}">{{ trans('frontend.home.adoption_text_3') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!----------------------SHOPS------------------------>
    <!--tab product-->
    <section class="section-big-py-space b-g-white ">

        <div class="title8  section-big-pt-space">
            <h4>{{ trans('frontend.home.products_text') }}</h4>
        </div>

        <div class="tab-product-main tab-four">
            <div class="tab-prodcut-contain">
                <ul class="tabs tab-title">
                    @foreach ($categories as $key => $category)
                        <li class="@if ($loop->first) current @endif">
                            <a href="tab-{{ $category->id }}">
                                {{ $category->name }}
                            </a>
                        </li>
                    @endforeach 
                </ul>
            </div>
        </div>
    </section>
    <!--tab product-->
    <!-- product box start -->

    <section class="our-gallery b-g-white section-big-pb-space">
        <div class="custom-container">
            <div class="row  ">
                <div class="col-12 p-0">
                    <div class="theme-tab">
                        <div class="tab-content-cls">
                            @foreach ($categories as $category)
                                <div id="tab-{{ $category->id }}"
                                    class="tab-content @if ($loop->first) active default @endif  product-block2">

                                    <div class="col-12">
                                        <div class="product-slide-4 no-arrow mb--5">
                                            @foreach ($category->categoryProducts()->where('published',1)
                                                                ->where('featured',1)->with('store')
                                                                ->take(4)->get() as $product)
                                                @include('frontend.partials.product-box',['product' => $product])
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endforeach 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- product box end -->
    <!----------------clinics------------------>

    <section class="collection  shops section-big-py-space ratio_square b-g-light">
        <div class="container">
            <div class="title8  section-big-pt-space">
                <h4>{{ trans('frontend.home.clinics') }} </h4>
            </div>
            <div class="row"> 
                <div class="col-md-12">
                    <div class="row partition-collection">
                        @foreach ($clinics as $clinic)
                            <div class="col-lg-2 col-md-6">
                                <div class="collection-block">
                                    <a href="{{ route('frontend.clinics.show',$clinic->id) }}">
                                        <div class="bg-size"
                                            style="background-image: url(&quot;{{ $clinic->logo ? $clinic->logo->getUrl() : '' }}&quot;); background-size: cover; background-position: center center; display: block;">
                                            <img src="{{ $clinic->logo ? $clinic->logo->getUrl() : '' }}" class=" bg-img" alt="collection-img"
                                                style="display: none;">
                                        </div>
                                        <div class="collection-content">
                                            <h3>{{ $clinic->clinic_name }}</h3>
                                            <div class="rating-box">
                                                @include('frontend.partials.rating',['rating' => $clinic->rating])
                                                <h4 class="price">
                                                    <i class="fa fa-map-marker"></i>&nbsp;
                                                    {{ $clinic->address }}
                                                </h4>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach   
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--tab product-->
    <!-- product section end -->
    <section class="collection-banner section-pb-space ">
        <div class="custom-container">
            <div class="row">
                <div class="col">
                    <div class="collection-banner-main banner-5 p-center">
                        <div class="collection-img bg-size"
                            style="background-image: url(&quot;{{ asset('frontend/assets/images/layout-1/collection-banner/7.jpg') }}&quot;); background-size: cover; background-position: center center; display: block;">
                            <img src="{{ asset('frontend/assets/images/background/banner02.jpg') }}" class="bg-img  " alt="banner"
                                style="display: none;">
                        </div>
                        <div class="collection-banner-contain ">
                            <div class="sub-contain">
                                <h4>{{ trans('frontend.home.explore_text_1') }}</h4>
                                <h3>{{ trans('frontend.home.explore_text_2') }}</h3>
                                <div class="shop">
                                    <a class="btn btn-normal" href="#">
                                        {{ trans('frontend.home.explore_text_3') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!--------------about-------------->
    <section class="about-home section-big-py-space text-center ">
        <div class="container">
            <div class="row"> 
                <h2 class="text-center">{{ get_setting('site_name') }}</h2>
                <br /><br />
                <p class="text-center ">
                    {{ get_setting('description') }}
                </p> 
            </div> 

            <!-- counter banner -->
            <section class="count counter-banner  ">
                <div class="custom-container">
                    <div class="row counter-block">
                        <div class="col-6 col-md-3">
                            <div class="counter-box">
                                <div class="count-up">
                                    <img src="{{ asset('frontend/assets/images/shop-store.svg') }}" width="70" />
                                    <h1><span class="counter-count">{{ get_setting('count_stores') }}</span>+</h1>
                                    <h3>{{ trans('frontend.home.counter_shops') }}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-3">
                            <div class="counter-box">
                                <div class="count-up">
                                    <img src="{{ asset('frontend/assets/images/heart-svgrepo-com.svg') }}"
                                        width="70" />
                                    <h1><span class="counter-count">{{ get_setting('count_pets') }}</span>+</h1>
                                    <h3>{{ trans('frontend.home.counter_pet_lovers') }}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-3">
                            <div class="counter-box">
                                <div class="count-up">
                                    <img src="{{ asset('frontend/assets/images/dog-face-svgrepo-com.svg') }}"
                                        width="70" />
                                    <h1><span class="counter-count">{{ get_setting('count_tweets') }}</span>+</h1>
                                    <h3>{{ trans('frontend.home.counter_posts') }}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-3">
                            <div class="counter-box">
                                <div class="count-up">
                                    <img src="{{ asset('frontend/assets/images/product.svg') }}" width="80" />
                                    <h1><span class="counter-count">{{ get_setting('count_products') }}</span>+</h1>
                                    <h3>{{ trans('frontend.home.counter_products') }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- counter banner -->

        </div>
    </section>
    <!--------------about-------------->
@endsection
