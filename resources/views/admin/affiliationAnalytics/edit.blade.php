@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.affiliationAnalytic.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.affiliation-analytics.update", [$affiliationAnalytic->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label>{{ trans('cruds.affiliationAnalytic.fields.model_type') }}</label>
                <select class="form-control {{ $errors->has('model_type') ? 'is-invalid' : '' }}" name="model_type" id="model_type">
                    <option value disabled {{ old('model_type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\AffiliationAnalytic::MODEL_TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('model_type', $affiliationAnalytic->model_type) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('model_type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('model_type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.affiliationAnalytic.fields.model_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="model">{{ trans('cruds.affiliationAnalytic.fields.model') }}</label>
                <input class="form-control {{ $errors->has('model') ? 'is-invalid' : '' }}" type="number" name="model" id="model" value="{{ old('model', $affiliationAnalytic->model) }}" step="1">
                @if($errors->has('model'))
                    <div class="invalid-feedback">
                        {{ $errors->first('model') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.affiliationAnalytic.fields.model_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="ip">{{ trans('cruds.affiliationAnalytic.fields.ip') }}</label>
                <input class="form-control {{ $errors->has('ip') ? 'is-invalid' : '' }}" type="text" name="ip" id="ip" value="{{ old('ip', $affiliationAnalytic->ip) }}">
                @if($errors->has('ip'))
                    <div class="invalid-feedback">
                        {{ $errors->first('ip') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.affiliationAnalytic.fields.ip_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="num_of_clicks">{{ trans('cruds.affiliationAnalytic.fields.num_of_clicks') }}</label>
                <input class="form-control {{ $errors->has('num_of_clicks') ? 'is-invalid' : '' }}" type="number" name="num_of_clicks" id="num_of_clicks" value="{{ old('num_of_clicks', $affiliationAnalytic->num_of_clicks) }}" step="1">
                @if($errors->has('num_of_clicks'))
                    <div class="invalid-feedback">
                        {{ $errors->first('num_of_clicks') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.affiliationAnalytic.fields.num_of_clicks_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="user_id">{{ trans('cruds.affiliationAnalytic.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id">
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ (old('user_id') ? old('user_id') : $affiliationAnalytic->user->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <div class="invalid-feedback">
                        {{ $errors->first('user') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.affiliationAnalytic.fields.user_helper') }}</span>
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