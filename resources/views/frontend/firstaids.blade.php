@extends('layouts.frontend')

@section('content')
    <div class="breadcrumb-main ">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-contain">
                        <div>
                            <h2>
                                {{ trans('frontend.paramedic.paramedics') }} 
                            </h2>
                            <ul>
                                <li><a href="{{ route('frontend.home') }}">{{ trans('frontend.paramedic.home')  }}</a></li>
                                <li><i class="fa fa-angle-double-left"></i></li>
                                <li><a href="javascript:void(0)">    {{ trans('frontend.paramedic.first_aids')  }} </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!----------content--------------->
    <section class="contact-page register-page section-big-py-space b-g-light order-tracking">
        <div class="custom-container">
            <div class="row">
                @foreach($paramedics as $paramedic)
                    <div class="col-md-6">
                        <div class="paramedicas">
                            <div class="paramedica">
                                <div class="row ">

                                    <div class="col-8 bl">
                                        <a href="{{ $paramedic->affiliation_link }}"> {{ $paramedic->name }} </a>
                                    </div>
                                    <div class="col-2 bl"> 
                                        @if($paramedic->is_active)
                                            <h5>{{ trans('frontend.paramedic.active') }}</h5>
                                        @else 
                                            <h5>{{ trans('frontend.paramedic.non_active') }}</h5>
                                        @endif
                                    </div> 
                                    <div class="col-2">
                                        <div class="sendmessage"><a href="{{ $paramedic->affiliation_link }}"> <i
                                                    class="fa fa-whatsapp" aria-hidden="true"></i></a></div>
                                    </div>

                                </div>
                            </div> 
                        </div>
                    </div> 
                @endforeach
            </div>
        </div> 

    </section>
@endsection
