@extends('layouts.frontend')
@section('content') 

    <div class="breadcrumb-main ">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-contain">
                        <div>
                            <h2> {{ trans('frontend.adoptions.adoption') }}</h2>
                            <ul>
                                <li><a href="{{ route("frontend.home") }}">{{ trans('frontend.adoptions.home') }}</a></li>

                                <li><i class="fa fa-angle-double-left"></i></li>
                                <li><a href="javascript:void(0)"> {{ trans('frontend.adoptions.adoption') }} </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="collection section-big-py-space ratio_square b-g-light"> 
        <div class="container">

            <div class="row breadcrumb-main mb-5 biref"> 
                {!! get_setting('adoption_text') !!}
            </div> 
            
            <div class="row partition-collection section-big-pt-space">
                @foreach ($adoptionPets as $adoptionPet)
                    <div class="col-lg-3 col-md-6">
                        <div class="collection-block have-border">
                            <div> 
                                <img src="{{ $adoptionPet->photo ? $adoptionPet->photo->getUrl() : '' }}"
                                onerror="this.onerror=null;this.src='{{ asset('no-image.png') }}';" class="img-fluid" alt="collection-img"> 
                            </div>
                            <div class="collection-content">
                                <h4>
                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                    {{$adoptionPet->age}} (Age)
                                </h4>

                                <p>{{$adoptionPet->name}}</p>
                                <small>({{ $adoptionPet->fasila }})</small>
                                <br>
                                <a href="{{route('frontend.adoption-requests.create',$adoptionPet->id)}}" class="btn btn-normal">
                                    طلب تبني
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{$adoptionPets->links()}}
        </div>
    </section>
@endsection
