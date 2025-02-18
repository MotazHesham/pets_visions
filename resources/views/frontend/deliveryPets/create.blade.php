@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.deliveryPet.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.delivery-pets.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label>{{ trans('cruds.deliveryPet.fields.from_city') }}</label>
                            <select class="form-control" name="from_city" id="from_city">
                                <option value disabled {{ old('from_city', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\DeliveryPet::FROM_CITY_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('from_city', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('from_city'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('from_city') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.deliveryPet.fields.from_city_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label>{{ trans('cruds.deliveryPet.fields.to_city') }}</label>
                            <select class="form-control" name="to_city" id="to_city">
                                <option value disabled {{ old('to_city', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\DeliveryPet::TO_CITY_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('to_city', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('to_city'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('to_city') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.deliveryPet.fields.to_city_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="date">{{ trans('cruds.deliveryPet.fields.date') }}</label>
                            <input class="form-control date" type="text" name="date" id="date" value="{{ old('date') }}">
                            @if($errors->has('date'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('date') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.deliveryPet.fields.date_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="note">{{ trans('cruds.deliveryPet.fields.note') }}</label>
                            <textarea class="form-control" name="note" id="note">{{ old('note') }}</textarea>
                            @if($errors->has('note'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('note') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.deliveryPet.fields.note_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="name">{{ trans('cruds.deliveryPet.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', '') }}">
                            @if($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.deliveryPet.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="email">{{ trans('cruds.deliveryPet.fields.email') }}</label>
                            <input class="form-control" type="email" name="email" id="email" value="{{ old('email') }}">
                            @if($errors->has('email'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.deliveryPet.fields.email_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="phone">{{ trans('cruds.deliveryPet.fields.phone') }}</label>
                            <input class="form-control" type="text" name="phone" id="phone" value="{{ old('phone', '') }}">
                            @if($errors->has('phone'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('phone') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.deliveryPet.fields.phone_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="pets_details">{{ trans('cruds.deliveryPet.fields.pets_details') }}</label>
                            <textarea class="form-control" name="pets_details" id="pets_details">{{ old('pets_details') }}</textarea>
                            @if($errors->has('pets_details'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('pets_details') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.deliveryPet.fields.pets_details_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection