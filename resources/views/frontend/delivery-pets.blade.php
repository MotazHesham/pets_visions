@extends('layouts.frontend')
@section('content')
    <div class="breadcrumb-main ">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-contain">
                        <div>
                            <h2>
                                {{ trans('frontend.delivery_pets.title') }}
                            </h2>
                            <ul>
                                <li><a href="{{ route('frontend.home') }}">{{ trans('frontend.delivery_pets.home') }}</a>
                                </li>
                                <li><i class="fa fa-angle-double-left"></i></li>
                                <li><a href="javascript:void(0)"> {{ trans('frontend.delivery_pets.contact') }} </a></li>
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
                <div class="col-lg-12">
                    @if ($errors->count() > 0)
                        <div class="alert alert-danger">
                            <ul class="list-unstyled">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form class="theme-form" action="{{ route('frontend.delivery-pets.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-8">
                                <div class="travel">
                                    <h3>
                                        {{ trans('frontend.delivery_pets.service_term') }}
                                    </h3>

                                    {!! nl2br(get_setting('delivery_text')) !!}

                                </div>

                                <hr>
                                <div class="row mt-2">
                                    <div class="form-group col-md-6">
                                        <label> {{ trans('frontend.delivery_pets.from_city') }}</label>
                                        <select class="form-control {{ $errors->has('from_city') ? 'is-invalid' : '' }}"
                                            name="from_city" id="from_city" required>
                                            <option value disabled {{ old('from_city', null) === null ? 'selected' : '' }}>
                                                {{ trans('global.pleaseSelect') }}</option>
                                            @foreach (App\Models\DeliveryPet::FROM_CITY_SELECT as $key => $label)
                                                <option value="{{ $key }}"
                                                    {{ old('from_city', '') === (string) $key ? 'selected' : '' }}>
                                                    {{ $label }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label> {{ trans('frontend.delivery_pets.to_city') }}</label>

                                        <select class="form-control {{ $errors->has('to_city') ? 'is-invalid' : '' }}"
                                            name="to_city" id="to_city" required>
                                            <option value disabled {{ old('to_city', null) === null ? 'selected' : '' }}>
                                                {{ trans('global.pleaseSelect') }}</option>
                                            @foreach (App\Models\DeliveryPet::TO_CITY_SELECT as $key => $label)
                                                <option value="{{ $key }}"
                                                    {{ old('to_city', '') === (string) $key ? 'selected' : '' }}>
                                                    {{ $label }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label> {{ trans('frontend.delivery_pets.date') }}</label>
                                        <div class="datepicker date input-group">
                                            <input type="text" placeholder="Choose Date"
                                                class="form-control date-package-picker {{ $errors->has('date') ? 'is-invalid' : '' }}"
                                                id="fecha1" name="date" required>
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                            </div>
                                        </div> 
                                    </div>
                                    <h2 class="mb-2">{{ trans('frontend.delivery_pets.pets_info') }}</h2>
                                    <div class="col-md-12" id="pets-container">
                                        <div class="row"> 
                                            <div class="form-group col-md-3">
                                                <label>{{ trans('frontend.delivery_pets.pet_type') }}</label>
                                                <select class="form-control select2 " name="pets_details[0][pet_type]">
                                                    @foreach ($pet_types as $id => $entry)
                                                        <option value="{{ $id }}" >{{ $entry }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label>{{ trans('frontend.delivery_pets.fasila') }}</label>
                                                <input class="form-control "
                                                    type="text" name="pets_details[0][fasila]" required></input>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label>{{ trans('frontend.delivery_pets.age') }}</label>
                                                <input class="form-control "
                                                    type="text" name="pets_details[0][age]" required></input>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <button class="btn btn-dark" type="button" onclick="add_more_pet()">{{ trans('frontend.delivery_pets.add_more') }} +</button>
                                    </div>


                                    <div class="form-group col-md-12">
                                        <label>{{ trans('frontend.delivery_pets.note') }}</label>
                                        <textarea class="form-control{{ $errors->has('note') ? 'is-invalid' : '' }}" name="note" size="1">
                                                
                                        </textarea>
                                    </div>
                                    
                                    <h2>{{ trans('frontend.delivery_pets.personal_info') }}</h2>

                                    <div class="form-group col-md-6">
                                        <label> {{ trans('frontend.delivery_pets.full_name') }}</label>
                                        <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                            type="text" name="name" placeholder="" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label> {{ trans('frontend.delivery_pets.email') }}</label>
                                        <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                            type="email" name="email" placeholder="" required>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label> {{ trans('frontend.delivery_pets.phone') }}</label>
                                        <input class="form-control  {{ $errors->has('phone') ? 'is-invalid' : '' }}"
                                            type="text" name="phone" placeholder="" required>
                                    </div>

                                    <button type="submit" class="btn btn-normal">{{ trans('frontend.delivery_pets.request_price') }}</a>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <img src="{{ asset('frontend/assets/images/pets_dlivery.png') }}" class="img-fluid">
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        function add_more_pet() {
            var container = document.getElementById('pets-container');
            var index = container.children.length; // Get the number of existing rows to increment index
            
            var html = ` 
                <div class="row" id="pet-row-${index}"> 
                    <div class="form-group col-md-3">
                        <label>{{ trans('frontend.delivery_pets.pet_type') }}</label>
                        <select class="form-control select2" name="pets_details[${index}][pet_type]">
                            @foreach ($pet_types as $id => $entry)
                                <option value="{{ $id }}">{{ $entry }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label>{{ trans('frontend.delivery_pets.fasila') }}</label>
                        <input class="form-control" type="text" name="pets_details[${index}][fasila]" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label>{{ trans('frontend.delivery_pets.age') }}</label>
                        <input class="form-control" type="text" name="pets_details[${index}][age]" required>
                    </div>
                    <div class="form-group col-md-3 d-flex align-items-end">
                        <button type="button" class="btn btn-danger" onclick="remove_pet(${index})">
                            {{ trans('frontend.remove') }}
                        </button>
                    </div>
                </div>`;
    
            container.insertAdjacentHTML('beforeend', html);
        }

        function remove_pet(index) {
            var row = document.getElementById(`pet-row-${index}`);
            if (row) {
                row.remove();
            }
        }
    </script>
@endsection