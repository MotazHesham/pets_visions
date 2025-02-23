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
                                <li><a href="{{ route('frontend.dashboard.info') }}">{{ trans('frontend.dashboard.menu.account_details') }}</a></li>
                                <li><a href="{{ route('frontend.dashboard.my-pets') }}">{{ trans('frontend.dashboard.menu.my_pets') }}</a></li> 
                                <li><a href="{{ route('frontend.dashboard.wishlists') }}">{{ trans('frontend.dashboard.menu.favs') }}</a></li> 
                                <li class="active"><a href="{{ route('frontend.dashboard.profile-edit') }}">{{ trans('frontend.dashboard.menu.account') }}</a></li> 
                                <li class="last"><a href="javascript:void(0)" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">{{ trans('frontend.dashboard.menu.logout') }}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="dashboard-right">
                        <div class="dashboard">
                            <section class="contact-page register-page">
                                <div class="custom-container">
                                    <div class="row">
                                        <div class="col-lg-12"> 
                                            @if ($errors->count() > 0)
                                                <div class="alert alert-danger">
                                                    <ul class="list-unstyled">
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                            <form class="theme-form" action="{{ route('frontend.dashboard.profile-update') }}" method="POST">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>{{ trans('frontend.dashboard.name') }}</label>
                                                            <input type="text" name="name" value="{{ $user->name }}" class="form-control"  required="">
                                                        </div>
                                                    </div> 
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>{{ trans('frontend.dashboard.phone') }}</label>
                                                            <input type="text" name="phone" value="{{ $user->phone }}" class="form-control"  required="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group"> 
                                                            <label>{{ trans('frontend.dashboard.email') }}</label>
                                                            <input type="email" name="email" value="{{ $user->email }}" class="form-control"  required=""> 
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>{{ trans('frontend.dashboard.password') }}</label>
                                                            <input type="password" name="password" class="form-control" >
                                                        </div>
                                                    </div> 
                                                </div>
                                                <button type="submit" class="btn btn-normal mt-4">
                                                    {{ trans('global.update') }}
                                                </button>
                                            </form>
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
