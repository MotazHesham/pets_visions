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
                                <li><a href="{{ route('frontend.dashboard.home') }}">{{ trans('frontend.dashboard.menu.main') }} </a></li>
                                <li class="active"><a href="{{ route('frontend.dashboard.info') }}">{{ trans('frontend.dashboard.menu.account_details') }}</a></li>
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
                            <div class="page-title">
                                <h2>{{ trans('frontend.dashboard.dashboard') }}</h2>
                            </div>
                            <div class="welcome-msg">
                                <p>{{ trans('frontend.dashboard.hello') }} : {{ $user->name }}</p>
                            </div>
                            <div class="box-account box-info">

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="box">
                                            <div class="box-title">
                                                <h3>{{ trans('frontend.dashboard.account_info') }}</h3>
                                            </div>
                                            <div class="box-content">
                                                <h6>{{ $user->name }}</h6>
                                                <h6>{{ $user->email }}</h6>
                                                <h6>{{ $user->phone }}</h6>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="box">
                                            <div class="box-title">
                                                <h3>{{ trans('frontend.dashboard.pets_info') }}</h3>
                                            </div>
                                            <div class="box-content">
                                                @foreach($user->userUserPets as $pet)
                                                    <p>{{ $pet->name }}</p>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                                <a href="{{ route('frontend.dashboard.profile-edit') }}" class="btn btn-normal mt-4">{{ trans('frontend.dashboard.edit_profile') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> 
@endsection
