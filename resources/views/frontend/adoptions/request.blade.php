@extends('layouts.frontend')
@section('content') 

    <div class="breadcrumb-main ">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-contain">
                        <div>
                            <h2> {{ trans('frontend.adoptions.request_adoption') }}</h2>
                            <ul>
                                <li><a href="{{ route("frontend.home") }}">{{ trans('frontend.adoptions.home') }}</a></li>

                                <li><i class="fa fa-angle-double-left"></i></li>
                                <li><a href="javascript:void(0)"> {{ trans('frontend.adoptions.request_adoption') }} </a></li>
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
                            {{ trans('frontend.adoptions.terms_text') }}
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
                    
                    <form method="POST" action="{{ route('frontend.adoption-requests.store') }}">
                        @csrf 
                        <input type="hidden" name="adoption_pet_id" value="{{ $adoptionPet->id }}" />
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">{{ trans('frontend.adoptions.first_name') }} </label>
                                    <input type="text"
                                        class="form-control {{ $errors->has('first_name') ? 'is-invalid' : '' }}"
                                        name="first_name" id="name" placeholder="" required="">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">{{ trans('frontend.adoptions.last_name') }}</label>
                                    <input type="text"
                                        class="form-control {{ $errors->has('last_name') ? 'is-invalid' : '' }}"
                                        name="last_name" id="name" placeholder="" required="">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name"> {{ trans('frontend.adoptions.phone') }}</label>
                                    <input class="form-control  {{ $errors->has('phone') ? 'is-invalid' : '' }}"
                                        type="text" name="phone" id="name" placeholder="" required="">
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">{{ trans('frontend.adoptions.email') }} </label>
                                    <input type="text"
                                        class="form-control  {{ $errors->has('email') ? 'is-invalid' : '' }}" name="email"
                                        id="name" placeholder="" required="">
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">{{ trans('frontend.adoptions.gender') }} </label>
                                    <select class="form-control" name="gender" required>
                                        <option value disabled {{ old('gender', null) === null ? 'selected' : '' }}>
                                            {{ trans('global.pleaseSelect') }}</option>
                                        @foreach (App\Models\AdoptionRequest::GENDER_RADIO as $key => $label)
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
                                    <label for="name"> {{ trans('frontend.adoptions.age') }} </label>
                                    <select class="form-control {{ $errors->has('age') ? 'is-invalid' : '' }}"
                                        name="age" id="age" required>
                                        <option value disabled {{ old('age', null) === null ? 'selected' : '' }}>
                                            {{ trans('global.pleaseSelect') }}</option>
                                        @foreach (App\Models\AdoptionRequest::AGE_SELECT as $key => $label)
                                            <option value="{{ $key }}"
                                                {{ old('age', '') === (string) $key ? 'selected' : '' }}>
                                                {{ $label }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>



                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name"> {{ trans('frontend.adoptions.address') }}</label>
                                    <input type="text" class="form-control" name="address" id="name"
                                        placeholder="{{ trans('frontend.adoptions.address') }}" required="">
                                </div>
                            </div>



                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">{{ trans('frontend.adoptions.experience') }}</label>
                                    <textarea type="text" class="form-control  {{ $errors->has('experience') ? 'is-invalid' : '' }}" name="experience"
                                        id="name" placeholder="{{ trans('frontend.adoptions.experience') }}" required=""></textarea>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">{{ trans('frontend.adoptions.note') }}</label>
                                    <textarea type="text" class="form-control  {{ $errors->has('note') ? 'is-invalid' : '' }}" name="note"
                                        id="name" placeholder="{{ trans('frontend.adoptions.note') }}" required=""></textarea>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <button class="btn btn-normal" type="submit">{{ trans('frontend.adoptions.request_adoption') }}</button>
                            </div> 

                        </div>
                    </form>

                </div>
            </div>
        </div>


    </section>
@endsection
