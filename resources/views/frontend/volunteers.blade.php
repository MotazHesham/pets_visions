@extends('layouts.frontend')
@section('content')

    <div class="breadcrumb-main ">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-contain">
                        <div>
                            <h2>
                                {{ trans('frontend.volunteer.volunteer') }} 
                            </h2>
                            <ul>
                                <li><a href="{{ route('frontend.home') }}">{{ trans('frontend.volunteer.home')  }}</a></li>
                                <li><i class="fa fa-angle-double-left"></i></li>
                                <li><a href="javascript:void(0)">    {{ trans('frontend.volunteer.volunteer')  }} </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="contact-page register-page section-big-py-space b-g-light order-tracking">
        <div class="custom-container">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="row breadcrumb-main mb-5">
                        <p>
                            {{ trans('frontend.volunteer.volunteer_text')  }}
                        </p>
                    </div>
                    @if ($errors->count() > 0)
                        <div class="alert alert-danger">
                            <ul class="list-unstyled">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('frontend.volunteers.store') }}" method="POST">
                        @csrf
                        <div class="row"> 
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="first_name"> {{ trans('frontend.volunteer.first_name')  }} </label>
                                    <input type="text" class="form-control" id="first_name" name="first_name"
                                        placeholder="" required="">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="last_name"> {{ trans('frontend.volunteer.last_name')  }} </label>
                                    <input type="text" class="form-control" name="last_name" id="last_name"
                                        placeholder="" required="">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="phone"> {{ trans('frontend.volunteer.phone')  }} </label>
                                    <input type="text" class="form-control" name="phone" id="phone"
                                        placeholder="" required="">
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="email">{{ trans('frontend.volunteer.email')  }}</label>
                                    <input type="text" class="form-control" name="email" id="email"
                                        placeholder="" required="">
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="gender">{{ trans('frontend.volunteer.gender')  }} </label>
                                    <select class="form-control" name="gender">
                                        @foreach (App\Models\Volunteer::GENDER_SELECT as $key => $label)
                                            <option value="{{ $key }}"
                                                {{ old('gender', '') === (string) $key ? 'selected' : '' }}>
                                                {{ $label }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="age">{{ trans('frontend.volunteer.gender')  }} </label>
                                    <select class="form-control" name="age">
                                        @foreach (App\Models\Volunteer::AGE_SELECT as $key => $label)
                                            <option value="{{ $key }}"
                                                {{ old('age', '') === (string) $key ? 'selected' : '' }}>{{ $label }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> 

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="experience">{{ trans('frontend.volunteer.experience')  }}</label>
                                    <input type="text" class="form-control" id="experience" name="experience"
                                        placeholder="" required="">
                                </div>
                            </div> 

                            <div class="col-md-12">
                                <p class="mb-2">
                                    {{ trans('frontend.volunteer.fields')  }} 
                                </p>

                                <div class="custom-control custom-checkbox mr-sm-2">
                                    @foreach (App\Models\Volunteer::FIELDS_RADIO as $key => $label)
                                        <div class="form-check {{ $errors->has('fields') ? 'is-invalid' : '' }}">
                                            <input class="form-check-input custom-control-input" type="radio"
                                                id="fields_{{ $key }}" name="fields" value="{{ $key }}"
                                                {{ old('fields', '') === (string) $key ? 'checked' : '' }}>
                                            <label class="form-check-label"
                                                for="fields_{{ $key }}">{{ $label }}</label>
                                        </div>
                                    @endforeach

                                </div>
                            </div> 
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="period_time">
                                        {{ trans('frontend.volunteer.period_time')  }} 
                                    </label>

                                    <select class="form-control" name="period_time">
                                        @foreach (App\Models\Volunteer::PERIOD_TIME_SELECT as $key => $label)
                                            <option value="{{ $key }}"
                                                {{ old('period_time', '') === (string) $key ? 'selected' : '' }}>
                                                {{ $label }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>



                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="note">{{ trans('frontend.volunteer.note')  }}</label>
                                    <textarea type="text" class="form-control" name="note" id="note" 
                                        required=""></textarea>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <button class="btn btn-normal" type="submit">{{ trans('frontend.volunteer.request_volunteer')  }}</button>
                            </div> 
                        </div>
                    </form>

                </div>
            </div>
        </div> 
    </section>
@endsection
