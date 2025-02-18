@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.adoptionRequest.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.adoption-requests.update", [$adoptionRequest->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="first_name">{{ trans('cruds.adoptionRequest.fields.first_name') }}</label>
                            <input class="form-control" type="text" name="first_name" id="first_name" value="{{ old('first_name', $adoptionRequest->first_name) }}">
                            @if($errors->has('first_name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('first_name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.adoptionRequest.fields.first_name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="last_name">{{ trans('cruds.adoptionRequest.fields.last_name') }}</label>
                            <input class="form-control" type="text" name="last_name" id="last_name" value="{{ old('last_name', $adoptionRequest->last_name) }}">
                            @if($errors->has('last_name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('last_name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.adoptionRequest.fields.last_name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="phone">{{ trans('cruds.adoptionRequest.fields.phone') }}</label>
                            <input class="form-control" type="text" name="phone" id="phone" value="{{ old('phone', $adoptionRequest->phone) }}">
                            @if($errors->has('phone'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('phone') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.adoptionRequest.fields.phone_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="email">{{ trans('cruds.adoptionRequest.fields.email') }}</label>
                            <input class="form-control" type="email" name="email" id="email" value="{{ old('email', $adoptionRequest->email) }}">
                            @if($errors->has('email'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.adoptionRequest.fields.email_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label>{{ trans('cruds.adoptionRequest.fields.gender') }}</label>
                            @foreach(App\Models\AdoptionRequest::GENDER_RADIO as $key => $label)
                                <div>
                                    <input type="radio" id="gender_{{ $key }}" name="gender" value="{{ $key }}" {{ old('gender', $adoptionRequest->gender) === (string) $key ? 'checked' : '' }}>
                                    <label for="gender_{{ $key }}">{{ $label }}</label>
                                </div>
                            @endforeach
                            @if($errors->has('gender'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('gender') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.adoptionRequest.fields.gender_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label>{{ trans('cruds.adoptionRequest.fields.age') }}</label>
                            <select class="form-control" name="age" id="age">
                                <option value disabled {{ old('age', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\AdoptionRequest::AGE_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('age', $adoptionRequest->age) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('age'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('age') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.adoptionRequest.fields.age_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="address">{{ trans('cruds.adoptionRequest.fields.address') }}</label>
                            <input class="form-control" type="text" name="address" id="address" value="{{ old('address', $adoptionRequest->address) }}">
                            @if($errors->has('address'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('address') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.adoptionRequest.fields.address_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="experience">{{ trans('cruds.adoptionRequest.fields.experience') }}</label>
                            <textarea class="form-control" name="experience" id="experience">{{ old('experience', $adoptionRequest->experience) }}</textarea>
                            @if($errors->has('experience'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('experience') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.adoptionRequest.fields.experience_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="note">{{ trans('cruds.adoptionRequest.fields.note') }}</label>
                            <textarea class="form-control" name="note" id="note">{{ old('note', $adoptionRequest->note) }}</textarea>
                            @if($errors->has('note'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('note') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.adoptionRequest.fields.note_helper') }}</span>
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