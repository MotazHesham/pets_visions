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
                                <input type="hidden" name="user_type" value="pet_lover" id="">
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
                                        <h3 class="form-title">{{ trans('frontend.register.personal_info') }}</h3>
                                        
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
                                            <input type="text" name="phone" value="{{ old('phone') }}" placeholder="{{ trans('frontend.register.phone') }}"
                                                class="form-control">
                                        </div> 
                                    </div>
                                    <button type="button" name="previous"
                                        class="previous btn btn-normal ">{{ trans('frontend.register.prev') }}</button>
                                    <button type="button" name="next"
                                        class=" btn btn-normal next action-button">{{ trans('frontend.register.next') }}</button>
                                </div>
                                <div class="checkout-fr-box">
                                    <div class="form-card"> 
                                        <h3 class="form-title">{{ trans('frontend.register.pet_info') }}</h3>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="name">{{ trans('frontend.dashboard.store_pet.name') }}</label>
                                                <input type="text" name="pet_name" class="form-control" >
                                            </div>
                            
                                            <div class="form-group col-md-6">
                                                <label for="pet_type_id">{{ trans('frontend.dashboard.store_pet.pet_type') }}</label>
                                                <select class="form-control" name="pet_type_id"  >
                                                    @foreach($pet_types as $id => $entry)
                                                        <option value="{{ $id }}" {{ old('pet_type_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                                    @endforeach
                                                </select>
                                            </div> 
                                            <div class="form-group col-md-6">
                                                <label for="gender">{{ trans('frontend.dashboard.store_pet.gender') }}</label>
                                                <select class="form-control" name="gender"  >
                                                    <option value disabled {{ old('gender', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                                    @foreach(App\Models\UserPet::GENDER_SELECT as $key => $label)
                                                        <option value="{{ $key }}" {{ old('gender', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                                    @endforeach
                                                </select>
                                            </div> 
                                            <div class="form-group col-md-6">
                                                <label for="fasila">{{ trans('frontend.dashboard.store_pet.fasila') }}</label>
                                                <input type="text" name="fasila" id="fasila" class="form-control" >
                                            </div>
                            
                                            <div class="form-group col-md-12">
                                                <label for="date">{{ trans('frontend.dashboard.store_pet.date') }}</label> 
                                                <div class="datepicker date input-group">
                                                    <input type="text" name="dob" placeholder="Choose Date" class="form-control date-package-picker" id="fecha1">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                    </div>
                                                </div>   
                                            </div>  
                                            <div class="form-group col-md-12">
                                                <label for="name">
                                                    {{ trans('frontend.dashboard.store_pet.photo') }}
                                                </label>
                                                <br>
                                                <span class="  btn-normal mb-2" data-name="photo">
                                                    <input size="40"
                                                        class="wpcf7-form-control wpcf7-file wpcf7-validates-as-required"
                                                        accept=".pdf,.jpg,.jpeg,.png,.doc"  aria-invalid="false" type="file"
                                                        name="photo"></span><br> 
                                            </div>
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
