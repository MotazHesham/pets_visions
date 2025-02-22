@extends('layouts.frontend')

@section('content')
    <!--header end-->
    <div class="breadcrumb-main ">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-contain">
                        <div>
                            <h2> {{ trans('frontend.hostings.title') }}</h2>
                            <ul>
                                <li><a href="{{ route("frontend.home") }}">{{ trans('frontend.hostings.home') }}</a></li>

                                <li><i class="fa fa-angle-double-left"></i></li>
                                <li><a href="javascript:void(0)"> {{ trans('frontend.hostings.hosting') }} </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <section class="authentication-page section-big-pt-space b-g-light">

        <div class="custom-container ">
            <div class="row breadcrumb-main mb-5 host-bg ">
                <h2 class="text-center mb-3">
                    {{ trans('frontend.hostings.request_hosting') }}
                </h2>
                <p class="text-center mb-3">
                    {!! get_setting('hosting_text') !!}
                </p> 
            </div>
        </div>

        <div class="custom-container">
            <section class="search-block">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 offset-lg-3">
                            <form class="form-header">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="search" aria-label="" value="{{ getFromRequest('search') }}"
                                        placeholder="{{ trans('frontend.hostings.search_by_hosting') }}">
                                    <button class="btn btn-normal"><i class="fa fa-search"></i>{{ trans('frontend.hostings.search') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>

    </section>
    <section class="collection section-big-py-space ratio_square b-g-light">
        <div class="container"> 
            <div class="row partition-collection">
                @foreach($hostings as $hosting)
                    <div class="col-lg-3 col-md-6">
                        <div class="collection-block">
                            <div>
                                <img src="{{ $hosting->logo ? $hosting->logo->getUrl() : '' }}" 
                                        onerror="this.onerror=null;this.src='{{ asset('no-image.png') }}';" class="img-fluid  bg-img" alt="collection-img"
                                    style="display: none;">
                            </div>
                            <div class="collection-content">

                                <h3>{{ $hosting->hosting_name }}</h3>
                                <p>{{ $hosting->short_description }}</p>
                                <a href="{{ route('frontend.hostings.show',$hosting->id) }}" class="btn btn-normal">
                                    {{ trans('frontend.hostings.show') }}
                                </a>
                            </div>
                        </div>
                    </div> 
                @endforeach
            </div> 
            <div class="mt-3"> 
                {{ $hostings->appends(request()->input())->links() }}
            </div> 
        </div>  
    </section> 
@endsection
