@extends('layouts.frontend')

@section('content')
    <div class="breadcrumb-main ">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-contain">
                        <div>
                            <h2>
                                ابلاغ عن فقد أليف
                            </h2>
                            <ul>
                                <li><a href="index.html">الرئيسية</a></li>

                                <li><i class="fa fa-angle-double-left"></i></li>
                                <li><a href="javascript:void(0)"> ارسال البلاغ </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- footer start -->
    <!----------content--------------->
    <section class="contact-page register-page section-big-py-space b-g-light order-tracking">
        <div class="custom-container">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    @if ($errors->count() > 0)
                        <div class="alert alert-danger">
                            <ul class="list-unstyled">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('frontend.stray-pets.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="type" value="{{ $type }}" id="">
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="first_name">{{ trans('frontend.stray_pet_create.first_name') }}</label>
                                    <input type="text" class="form-control" id="first_name" name="first_name"
                                        required="">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="last_name">{{ trans('frontend.stray_pet_create.last_name') }} </label>
                                    <input type="text" class="form-control" id="last_name" name="last_name"
                                        required="">
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">{{ trans('frontend.stray_pet_create.email') }} </label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        required="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone">{{ trans('frontend.stray_pet_create.phone') }}</label>
                                    <input type="text" class="form-control" id="phone" name="phone"
                                        required="">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="pet_type_id">{{ trans('frontend.stray_pet_create.pet_type') }} </label>
                                    <select class="form-control" name="pet_type_id" required id="pet_type_id">
                                        @foreach ($pet_types as $id => $entry)
                                            <option value="{{ $id }}" {{ old('pet_type_id') == $id ? 'selected' : '' }}>
                                                {{ $entry }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="date">{{ trans('frontend.stray_pet_create.date') }}</label> 
                                    <div class="datepicker date input-group">
                                        <input type="text" name="date" placeholder="Choose Date" class="form-control date-package-picker" id="fecha1">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                        </div>
                                    </div>  
                                </div>
                            </div> 

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="missing_place"> ({{ trans('frontend.stray_pet_create.map_link') }}) {{ trans('frontend.stray_pet_create.missing_place') }} </label>
                                    <input type="text" class="form-control" name="missing_place" id="missing_place" placeholder=" {{ trans('frontend.stray_pet_create.missing_place') }}"
                                        required="">
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="receiving_place"> ({{ trans('frontend.stray_pet_create.map_link') }}) {{ trans('frontend.stray_pet_create.receiving_place') }} </label>
                                    <input type="text" class="form-control" name="receiving_place" id="receiving_place" placeholder=" {{ trans('frontend.stray_pet_create.receiving_place') }}"
                                        required="">
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="affiliation_link">{{ trans('frontend.stray_pet_create.affiliation_link') }}</label>
                                    <input type="text" class="form-control" id="affiliation_link" name="affiliation_link"
                                        required="" placeholder="ex:- https://api.whatsapp.com/send?phone=20xx2x1x2x1">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="photo">{{ trans('frontend.stray_pet_create.photo') }}</label>
                                    <input type="file" class="form-control" id="photo" name="photo"
                                        required="">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">{{ trans('frontend.stray_pet_create.note') }} </label>
                                    <textarea type="text" class="form-control" id="name" placeholder=" {{ trans('frontend.stray_pet_create.note') }}" required=""></textarea>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <button class="btn btn-normal" type="submit">
                                    {{ trans('frontend.stray_pet_create.send') }}
                                </button>
                            </div>
                            
                        </div> 
                    </form>
                </div>
            </div>
        </div>


    </section>
@endsection
