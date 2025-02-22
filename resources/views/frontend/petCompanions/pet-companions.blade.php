@extends('layouts.frontend')

@section('content')

    <section class="authentication-page section-big-pt-space b-g-light">
        <div class="custom-containe">
            <section class="search-block">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 offset-lg-3">
                            <form class="form-header" method="GET"> 
                                <div class="input-group">
                                    <input type="text" name="search" id="search-input" class="form-control" 
                                        aria-label="{{ trans('frontend.pet_companions.search_companion') }}"
                                        value="{{ getFromRequest('search') }}"
                                        placeholder="{{ trans('frontend.pet_companions.search_companion') }}">
                                    <button type="submit" id="search-btn" class="btn btn-normal">
                                        <i class="fa fa-search"></i>
                                        {{ trans('frontend.pet_companions.search') }}
                                    </button>
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
            <div class="row partition-collection" id="shop-list">
                @foreach ($petCompanions as $petCompanion)
                    <div class="col-lg-3 col-md-6">
                        <div class="collection-block">
                            <div>
                                <img src="{{ $petCompanion->photo ? $petCompanion->photo->getUrl() : '' }}" class="img-fluid  bg-img"
                                    alt="collection-img" style="display: none;">
                            </div>
                            <div class="collection-content"> 
                                <h3>{{ $petCompanion->user->name ?? '' }}</h3> 
                                <a href="{{ route('frontend.pet-companions.show', $petCompanion->id) }}" class="btn btn-normal">
                                    {{ trans('frontend.pet_companions.show') }}
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mt-3"> 
                {{ $petCompanions->appends(request()->input())->links() }}
            </div>
        </div>
    </section>
@endsection
