@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.petCompanionReview.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.pet-companion-reviews.update", [$petCompanionReview->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="pet_companion_id">{{ trans('cruds.petCompanionReview.fields.pet_companion') }}</label>
                <select class="form-control select2 {{ $errors->has('pet_companion') ? 'is-invalid' : '' }}" name="pet_companion_id" id="pet_companion_id" required>
                    @foreach($pet_companions as $id => $entry)
                        <option value="{{ $id }}" {{ (old('pet_companion_id') ? old('pet_companion_id') : $petCompanionReview->pet_companion->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('pet_companion'))
                    <div class="invalid-feedback">
                        {{ $errors->first('pet_companion') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.petCompanionReview.fields.pet_companion_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="user_id">{{ trans('cruds.petCompanionReview.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id">
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ (old('user_id') ? old('user_id') : $petCompanionReview->user->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <div class="invalid-feedback">
                        {{ $errors->first('user') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.petCompanionReview.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="name">{{ trans('cruds.petCompanionReview.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $petCompanionReview->name) }}">
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.petCompanionReview.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="rate">{{ trans('cruds.petCompanionReview.fields.rate') }}</label>
                <input class="form-control {{ $errors->has('rate') ? 'is-invalid' : '' }}" type="number" name="rate" id="rate" value="{{ old('rate', $petCompanionReview->rate) }}" step="1" required>
                @if($errors->has('rate'))
                    <div class="invalid-feedback">
                        {{ $errors->first('rate') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.petCompanionReview.fields.rate_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="comment">{{ trans('cruds.petCompanionReview.fields.comment') }}</label>
                <textarea class="form-control {{ $errors->has('comment') ? 'is-invalid' : '' }}" name="comment" id="comment">{{ old('comment', $petCompanionReview->comment) }}</textarea>
                @if($errors->has('comment'))
                    <div class="invalid-feedback">
                        {{ $errors->first('comment') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.petCompanionReview.fields.comment_helper') }}</span>
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