@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.adoptionRequest.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.adoption-requests.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="first_name">{{ trans('cruds.adoptionRequest.fields.first_name') }}</label>
                <input class="form-control {{ $errors->has('first_name') ? 'is-invalid' : '' }}" type="text" name="first_name" id="first_name" value="{{ old('first_name', '') }}">
                @if($errors->has('first_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('first_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.adoptionRequest.fields.first_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="last_name">{{ trans('cruds.adoptionRequest.fields.last_name') }}</label>
                <input class="form-control {{ $errors->has('last_name') ? 'is-invalid' : '' }}" type="text" name="last_name" id="last_name" value="{{ old('last_name', '') }}">
                @if($errors->has('last_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('last_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.adoptionRequest.fields.last_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="phone">{{ trans('cruds.adoptionRequest.fields.phone') }}</label>
                <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text" name="phone" id="phone" value="{{ old('phone', '') }}">
                @if($errors->has('phone'))
                    <div class="invalid-feedback">
                        {{ $errors->first('phone') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.adoptionRequest.fields.phone_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="email">{{ trans('cruds.adoptionRequest.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email') }}">
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
                    <div class="form-check {{ $errors->has('gender') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="gender_{{ $key }}" name="gender" value="{{ $key }}" {{ old('gender', '') === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="gender_{{ $key }}">{{ $label }}</label>
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
                <select class="form-control {{ $errors->has('age') ? 'is-invalid' : '' }}" name="age" id="age">
                    <option value disabled {{ old('age', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\AdoptionRequest::AGE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('age', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
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
                <input class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" type="text" name="address" id="address" value="{{ old('address', '') }}">
                @if($errors->has('address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('address') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.adoptionRequest.fields.address_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="experience">{{ trans('cruds.adoptionRequest.fields.experience') }}</label>
                <textarea class="form-control {{ $errors->has('experience') ? 'is-invalid' : '' }}" name="experience" id="experience">{{ old('experience') }}</textarea>
                @if($errors->has('experience'))
                    <div class="invalid-feedback">
                        {{ $errors->first('experience') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.adoptionRequest.fields.experience_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="note">{{ trans('cruds.adoptionRequest.fields.note') }}</label>
                <textarea class="form-control {{ $errors->has('note') ? 'is-invalid' : '' }}" name="note" id="note">{{ old('note') }}</textarea>
                @if($errors->has('note'))
                    <div class="invalid-feedback">
                        {{ $errors->first('note') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.adoptionRequest.fields.note_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="adoption_pet_id">{{ trans('cruds.adoptionRequest.fields.adoption_pet') }}</label>
                <select class="form-control select2 {{ $errors->has('adoption_pet') ? 'is-invalid' : '' }}" name="adoption_pet_id" id="adoption_pet_id" required>
                    @foreach($adoption_pets as $id => $entry)
                        <option value="{{ $id }}" {{ old('adoption_pet_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('adoption_pet'))
                    <div class="invalid-feedback">
                        {{ $errors->first('adoption_pet') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.adoptionRequest.fields.adoption_pet_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection