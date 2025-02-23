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
                                <li><a href="{{ route('frontend.dashboard.home') }}">{{ trans('frontend.dashboard.menu.main') }}
                                    </a></li>
                                <li><a
                                        href="{{ route('frontend.dashboard.info') }}">{{ trans('frontend.dashboard.menu.account_details') }}</a>
                                </li>
                                <li class="active"><a
                                        href="{{ route('frontend.dashboard.my-pets') }}">{{ trans('frontend.dashboard.menu.my_pets') }}</a>
                                </li>
                                <li><a
                                        href="{{ route('frontend.dashboard.wishlists') }}">{{ trans('frontend.dashboard.menu.favs') }}</a>
                                </li>
                                <li><a
                                        href="{{ route('frontend.dashboard.profile-edit') }}">{{ trans('frontend.dashboard.menu.account') }}</a>
                                </li>
                                <li class="last"><a href="javascript:void(0)"
                                        onclick="event.preventDefault(); document.getElementById('logoutform').submit();">{{ trans('frontend.dashboard.menu.logout') }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="dashboard-right">
                        <div class="dashboard category3">
                            <div class="row">
                                <div class="col-md-3"></div>
                                <div class="col-md-6">
                                    <div class="category-box">
                                        <div class="img-wrraper">
                                            <a href="#" tabindex="0">
                                                <img src="{{ $userPet->photo ? $userPet->photo->getUrl() : '' }}"
                                                    alt="category" class="img-fluid">
                                            </a>

                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="box">
                                                <div class="box-title">
                                                    <h3> {{ trans('frontend.dashboard.store_pet.name') }}</h3><a
                                                        href="javascript:void(0)">{{ $userPet->name }}</a>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="box">
                                                <div class="box-title">
                                                    <h3> {{ trans('frontend.dashboard.store_pet.pet_type') }}</h3><a
                                                        href="javascript:void(0)">{{ $userPet->pet_type->name ?? '' }}</a>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="box">
                                                <div class="box-title">
                                                    <h3>{{ trans('frontend.dashboard.store_pet.fasila') }}</h3><a
                                                        href="javascript:void(0)">{{ $userPet->fasila }}</a>
                                                </div>
                                                <div class="box-content">

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="box">
                                                <div class="box-title">
                                                    <h3>{{ trans('frontend.dashboard.store_pet.date') }}</h3><a
                                                        href="javascript:void(0)">{{ $userPet->dob }}</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="box">
                                                <div class="box-title">
                                                    <h3>{{ trans('frontend.dashboard.store_pet.gender') }}</h3><a
                                                        href="javascript:void(0)">{{ $userPet->gender ? \App\Models\UserPet::GENDER_SELECT[$userPet->gender] : '' }}</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="fixed">
                                            <a href="" class="btn btn-normal btn-sm" tabindex="0"
                                                data-popup-open="popup-1"> {{ trans('global.edit') }} </a>
                                            <a href="{{ route('frontend.dashboard.my-pets.destroy',$userPet->id) }}" 
                                                onclick="return confirm('{{trans('frontend.dashboard.confirm_delete')}}')"
                                                class="btn btn-normal pro-btn btn-sm " tabindex="0">
                                                {{ trans('global.delete') }}</a>
                                        </div>

                                        <div class="popup" data-popup="popup-1">
                                            <div class="popup-inner sponsors_inner">

                                                <h2>{{ trans('frontend.dashboard.edit_pet') }}</h2>

                                                @if ($errors->count() > 0)
                                                    <div class="alert alert-danger">
                                                        <ul class="list-unstyled">
                                                            @foreach ($errors->all() as $error)
                                                                <li>{{ $error }}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                @endif
                                                <form class="theme-form row" method="POST" action="{{ route('frontend.dashboard.my-pets.update') }}" enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $userPet->id }}" id="">
                                                    <div class="form-group col-md-6">
                                                        <label for="name">{{ trans('frontend.dashboard.store_pet.name') }}</label>
                                                        <input type="text" name="name" value="{{ $userPet->name }}" class="form-control" required="">
                                                    </div>
                                    
                                                    <div class="form-group col-md-6">
                                                        <label for="pet_type_id">{{ trans('frontend.dashboard.store_pet.pet_type') }}</label>
                                                        <select class="form-control" name="pet_type_id" required>
                                                            @foreach($pet_types as $id => $entry)
                                                                <option value="{{ $id }}" {{ old('pet_type_id',$userPet->pet_type_id) == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div> 
                                                    <div class="form-group col-md-6">
                                                        <label for="gender">{{ trans('frontend.dashboard.store_pet.gender') }}</label>
                                                        <select class="form-control" name="gender" required>
                                                            <option value disabled {{ old('gender', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                                            @foreach(App\Models\UserPet::GENDER_SELECT as $key => $label)
                                                                <option value="{{ $key }}" {{ old('gender', $userPet->gender) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div> 
                                                    <div class="form-group col-md-6">
                                                        <label for="fasila">{{ trans('frontend.dashboard.store_pet.fasila') }}</label>
                                                        <input type="text" name="fasila" value="{{ $userPet->fasila }}" id="fasila" class="form-control" required="">
                                                    </div>
                                    
                                                    <div class="form-group col-md-12">
                                                        <label for="date">{{ trans('frontend.dashboard.store_pet.date') }}</label> 
                                                        <div class="datepicker date input-group">
                                                            <input type="text" name="dob" value="{{ $userPet->dob }}" placeholder="Choose Date" class="form-control date-package-picker" id="fecha1">
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
                                                                accept=".pdf,.jpg,.jpeg,.png,.doc" aria-required="true" aria-invalid="false" type="file"
                                                                name="photo"></span><br> 
                                                    </div>
                                                    <button class="btn btn-sm btn-normal mb-lg-5"
                                                        type="submit">{{ trans('global.save') }}</button>
                                                </form>


                                                <a class="popup-close " data-popup-close="popup-1" href="#">x</a>
                                            </div>


                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            @if ( $errors->count() > 0 ) 
                $('[data-popup="popup-1"]').fadeIn(350);
            @endif 
        })
        $(function() {
            //----- OPEN
            $('[data-popup-open]').on('click', function(e) {
                var targeted_popup_class = jQuery(this).attr('data-popup-open');
                $('[data-popup="' + targeted_popup_class + '"]').fadeIn(350);

                e.preventDefault();
            });

            //----- CLOSE
            $('[data-popup-close]').on('click', function(e) {
                var targeted_popup_class = jQuery(this).attr('data-popup-close');
                $('[data-popup="' + targeted_popup_class + '"]').fadeOut(350);

                e.preventDefault();
            });
        });
    </script>
@endsection
