@extends('layouts.frontend')

@section('content')
    <!--header end-->
    <div class="breadcrumb-main ">
        <div class="container">

            <div class="row">
                <div class="col">
                    <div class="breadcrumb-contain">
                        <div>
                            <h2> {{ trans('frontend.stray_pets.stray') }} </h2>
                            <ul>
                                <li><a href="{{ route('frontend.home') }}">{{ trans('frontend.stray_pets.home') }}</a></li>
                                <li><i class="fa fa-angle-double-left"></i></li>
                                <li><a href="javascript:void(0)"> {{ trans('frontend.stray_pets.stray') }} </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- footer start -->
    <!----------content--------------->
    <section class="collection section-big-py-space ratio_square b-g-light">
        <div class="container">

            <div class="row">
                <section class="collection-banner  section-big-py-space ">
                    <div class="container">
                        <div class="row ">


                            <div class="col-md-6">
                                <div class="losted-banner ">

                                    <div class="home_banner_content">
                                        <h3>{{ trans('frontend.stray_pets.found') }}</h3> 
                                        {{ get_setting('found_pet_text') }}
                                        <br />
                                        <a href="{{ route('frontend.stray-pets.create','found') }}"> 
                                            <button class="btn btn-normal mt-4" type="submit">
                                                {{ trans('frontend.stray_pets.found_report') }}
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="found-banner ">

                                    <div class="home_banner_content">
                                        <h3>{{ trans('frontend.stray_pets.missing') }}</h3>
                                        {{ get_setting('missing_pet_text') }}
                                        <br />
                                        <a href="{{ route('frontend.stray-pets.create','missing') }}"> 
                                            <button class="btn btn-normal mt-4" type="submit"> 
                                                {{ trans('frontend.stray_pets.missing_report') }}
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
            <div class="row partition-collection"> 
                @foreach($strayPets as $strayPet)
                    <div class="col-lg-3 col-md-6 mt-3">
                        <div class="collection-block have-border">
                            <div>
                                <img src="{{ $strayPet->photo ? $strayPet->photo->getUrl() : '' }}"
                                onerror="this.onerror=null;this.src='{{ asset('no-image.png') }}';" class="img-fluid" alt="collection-img">
                            </div>
                            <div class="collection-content">
                                <h4>
                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                    {{ $strayPet->date }}
                                </h4>

                                <p>{{ $strayPet->missing_place }}</p>
                                <a href="{{ $strayPet->affiliation_link }}" target="_blank" class="btn btn-normal">
                                    {{ trans('frontend.stray_pets.this_is_my_pet') }}
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div> 
            <div>
                {{ $strayPets->links() }}
            </div>
        </div>
    </section>
@endsection
