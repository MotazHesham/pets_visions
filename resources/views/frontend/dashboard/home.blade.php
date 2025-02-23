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
                                <li class="active"><a href="{{ route('frontend.dashboard.home') }}">{{ trans('frontend.dashboard.menu.main') }} </a></li>
                                <li><a href="{{ route('frontend.dashboard.info') }}">{{ trans('frontend.dashboard.menu.account_details') }}</a></li>
                                <li><a href="{{ route('frontend.dashboard.my-pets') }}">{{ trans('frontend.dashboard.menu.my_pets') }}</a></li> 
                                <li><a href="{{ route('frontend.dashboard.wishlists') }}">{{ trans('frontend.dashboard.menu.favs') }}</a></li> 
                                <li><a href="{{ route('frontend.dashboard.profile-edit') }}">{{ trans('frontend.dashboard.menu.account') }}</a></li> 
                                <li class="last"><a href="javascript:void(0)" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">{{ trans('frontend.dashboard.menu.logout') }}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="dashboard-right">
                        <div class="dashboard">
                            <div class="row">  

                                <div class="col-md-4">
                                    <a href="{{ route('frontend.hostings') }}">
                                        <div class="dash-main">
                                            <div class="icon"><img src="{{ asset('frontend/assets/images/services07.png') }}"></div>
                                            <span>{{ trans('frontend.dashboard.main.hosting') }}</span>
                                        </div>
                                    </a>
                                </div>


                                <div class="col-md-4">
                                    <a href="{{ route('frontend.adoptions') }}">
                                        <div class="dash-main">
                                            <div class="icon"><img src="{{ asset('frontend/assets/images/services09.png') }}"></div>
                                            <span>{{ trans('frontend.dashboard.main.adoption') }}</span>
                                        </div>
                                    </a>
                                </div>


                                <div class="col-md-4">
                                    <a href="{{ route('frontend.pet-companions') }}">
                                        <div class="dash-main">
                                            <div class="icon"><img src="{{ asset('frontend/assets/images/services10.png') }}"></div>
                                            <span>{{ trans('frontend.dashboard.main.pet_compantion') }}</span>
                                        </div>
                                    </a>
                                </div>


                                <div class="col-md-4">
                                    <a href="{{ route('frontend.delivery-pets') }}">
                                        <div class="dash-main">
                                            <div class="icon"><img src="{{ asset('frontend/assets/images/services04.png') }}"></div>
                                            <span> {{ trans('frontend.dashboard.main.delivery_pet') }} </span>
                                        </div>
                                    </a>
                                </div>

                                <div class="col-md-4">
                                    <a href="{{ route('frontend.firstaids') }}">
                                        <div class="dash-main">
                                            <div class="icon"><img src="{{ asset('frontend/assets/images/services03.png') }}"></div>
                                            <span> {{ trans('frontend.dashboard.main.first_aid') }}</span>
                                        </div>
                                    </a>
                                </div>

                                <div class="col-md-4">
                                    <a href="{{ route('frontend.dashboard.my-pets') }}">
                                        <div class="dash-main">
                                            <div class="icon"><img src="{{ asset('frontend/assets/images/pets.png') }}" width="80"></div>
                                            <span> {{ trans('frontend.dashboard.main.my_pets') }}</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> 
@endsection
