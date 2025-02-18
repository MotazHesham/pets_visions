@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.clinicReview.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.clinic-reviews.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="clinic_id">{{ trans('cruds.clinicReview.fields.clinic') }}</label>
                            <select class="form-control select2" name="clinic_id" id="clinic_id" required>
                                @foreach($clinics as $id => $entry)
                                    <option value="{{ $id }}" {{ old('clinic_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('clinic'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('clinic') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.clinicReview.fields.clinic_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="user_id">{{ trans('cruds.clinicReview.fields.user') }}</label>
                            <select class="form-control select2" name="user_id" id="user_id">
                                @foreach($users as $id => $entry)
                                    <option value="{{ $id }}" {{ old('user_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('user'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('user') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.clinicReview.fields.user_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="name">{{ trans('cruds.clinicReview.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', '') }}">
                            @if($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.clinicReview.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="rate">{{ trans('cruds.clinicReview.fields.rate') }}</label>
                            <input class="form-control" type="number" name="rate" id="rate" value="{{ old('rate', '') }}" step="1" required>
                            @if($errors->has('rate'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('rate') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.clinicReview.fields.rate_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="comment">{{ trans('cruds.clinicReview.fields.comment') }}</label>
                            <textarea class="form-control" name="comment" id="comment">{{ old('comment') }}</textarea>
                            @if($errors->has('comment'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('comment') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.clinicReview.fields.comment_helper') }}</span>
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