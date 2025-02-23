@extends('layouts.frontend')

@section('content')
    <section class="checkout-second section-big-py-space b-g-light">
        <div class="custom-container" id="grad1">
            <div class="row justify-content-center">
                <div class="col-md-11">
                    <div class=" checkout-box">
                        <div class="checkout-header mb-3">
                            <h2>{{ trans('frontend.register.title') }}</h2> 
                        </div>

                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <a href="{{route('frontend.register','pet-lover')}}">
                                    <img src="{{asset('frontend/assets/images/user_option3.png')}}" width="50" /> 
                                    {{ trans('frontend.register.pet_lover') }}
                                </a>
                            </div>
                            <div class="col-md-2 mb-3"> <a href="{{route('frontend.register','pet-companion')}}">
                                    <img src="{{asset('frontend/assets/images/user_option3.png')}}" width="50" /> 
                                    {{ trans('frontend.register.pet_companion') }}
                                </a></div>
                            <div class="col-md-2 mb-3"><a href="{{route('frontend.register','store')}}">
                                    <img src="{{asset('frontend/assets/images/user_option2.png')}}" width="50" /> 
                                    {{ trans('frontend.register.store') }}
                                </a></div>
                            <div class="col-md-2 mb-3"><a href="{{route('frontend.register','clinic')}}">
                                    <img src="{{asset('frontend/assets/images/user_option2.png')}}" width="50" /> 
                                    {{ trans('frontend.register.clinic') }}
                                </a></div>
                            <div class="col-md-3 mb-3"><a href="{{route('frontend.register','hosting')}}">
                                    <img src="{{asset('frontend/assets/images/user_option2.png')}}" width="50" /> 
                                    {{ trans('frontend.register.hosting') }}
                                </a></div>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
    </section>
    
@endsection
