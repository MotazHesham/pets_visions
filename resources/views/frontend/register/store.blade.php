@extends('layouts.frontend')
@section('content') 
    <section class="checkout-second section-big-py-space b-g-light">
        <div class="custom-container" id="grad1">
            <div class="row justify-content-center">
                <div class="col-md-11">
                    <div class=" checkout-box">
                        <div class="checkout-header">
                            <h2>{{ trans('frontend.register.title') }}</h2>
                        </div>
                        <div class="checkout-body ">
                            @if ($errors->count() > 0)
                                <div class="alert alert-danger">
                                    <ul class="list-unstyled">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                            <br>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form class="checkout-form" method="POST" action="{{ route('frontend.register.store') }}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="user_type" value="store" id="">
                                <!-- chek menu bar -->
                                <ul class="menu-bar">
                                    <li class="active" id="account">
                                        <div class="icon">
                                            <img src="{{ asset('frontend/svgs/lock.svg') }}" width="20" alt="">
                                        </div>
                                        {{ trans('frontend.register.step1') }}
                                    </li>
                                    <li id="personal">
                                        <div class="icon">
                                            <img src="{{ asset('frontend/svgs/user.svg') }}" width="20" alt="">
                                        </div>
                                        {{ trans('frontend.register.step2') }}
                                    </li>
                                    <li id="payment">
                                        <div class="icon">
                                            <img src="{{ asset('frontend/svgs/check.svg') }}" width="20" alt="">
                                        </div>
                                        {{ trans('frontend.register.step3') }}
                                    </li> 
                                </ul>
                                <!-- chekout contian --> 

                                <div class="checkout-fr-box">
                                    <div class="form-card"> 
                                        <h3 class="form-title">{{ trans('frontend.register.store_info') }}</h3>
                                        <div class="form-group">
                                            <input type="text" name="store_name" value="{{ old('store_name') }}" placeholder="{{ trans('frontend.register.store_name') }}"
                                                class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="store_phone" value="{{ old('store_phone') }}" placeholder="{{ trans('frontend.register.store_phone') }}"
                                                class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="domain" value="{{ old('domain') }}" placeholder="{{ trans('frontend.register.domain') }}"
                                                class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="address" value="{{ old('address') }}" placeholder="{{ trans('frontend.register.address') }}"
                                                class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="">{{ trans('frontend.register.specializations') }}</label>
                                            <select class="form-control" name="specializations[]" multiple id="" style="height: 120px"> 
                                                @foreach ($specializations as $id => $specialization)
                                                    <option value="{{ $id }}"
                                                        {{ in_array($id, old('specializations', [])) ? 'selected' : '' }}>
                                                        {{ $specialization }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>{{ trans('frontend.register.logo') }}</label>
                                            <input type="file" id="logo" name="logo">
                                        </div> 
                                    </div>
                                    <button type="button" name="previous"
                                        class="previous btn btn-normal ">{{ trans('frontend.register.prev') }}</button>
                                    <button type="button" name="next"
                                        class=" btn btn-normal next action-button">{{ trans('frontend.register.next') }}</button>
                                </div>
                                <div class="checkout-fr-box">
                                    <div class="form-card">
                                        <h3 class="form-title">{{ trans('frontend.register.user_info') }}</h3>
                                        
                                        <div class="form-group">
                                            <input type="text" name="name" value="{{ old('name') }}" placeholder="{{ trans('frontend.register.name') }}"
                                                class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <input type="email" name="email" value="{{ old('email') }}" placeholder="{{ trans('frontend.register.email') }}"
                                                class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" value="{{ old('password') }}" placeholder="{{ trans('frontend.register.password') }}"
                                                class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="identity_num" value="{{ old('identity_num') }}" placeholder="{{ trans('frontend.register.identity_num') }}"
                                                class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="phone" value="{{ old('phone') }}" placeholder="{{ trans('frontend.register.phone') }}"
                                                class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="user_position" value="{{ old('user_position') }}" placeholder="{{ trans('frontend.register.user_position') }}"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <button type="button" name="previous"
                                        class="previous btn btn-normal ">{{ trans('frontend.register.prev') }}</button>
                                    <button type="button" name="next"
                                        class=" btn btn-normal next action-button">{{ trans('frontend.register.next') }}</button>
                                </div>
                                <div class="checkout-fr-box">
                                    <div class="Terms_Service">
                                        <h4>{{ trans('frontend.register.welcome') }} {{ get_setting('site_name') }}</h4>
                                        <p>
                                            {!! get_setting('terms') !!}
                                        </p> 
                                    </div>
                                    <div class="custom-control custom-checkbox  form-check">
                                        <input type="checkbox" class="custom-control-input form-check-input"
                                            id="customCheck1"  required>
                                        <label class="custom-control-label form-check-label mb-0" for="customCheck1">
                                            {{ trans('frontend.register.accept') }}
                                        </label>
                                    </div>
                                    <button type="button" name="previous"
                                        class="previous btn btn-normal ">{{ trans('frontend.register.prev') }}</button>
                                    <button type="submit" 
                                        class=" btn btn-normal   action-button">{{ trans('frontend.register.register') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts') 
    <!-- Checkout js-->
    <script src="{{ asset('frontend/assets/js/checkout.js') }}"></script> 
@endsection
