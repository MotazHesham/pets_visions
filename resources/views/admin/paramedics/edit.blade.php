@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.paramedic.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.paramedics.update", [$paramedic->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.paramedic.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $paramedic->name) }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.paramedic.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('active') ? 'is-invalid' : '' }}">
                    <input class="form-check-input" type="checkbox" name="active" id="active" value="1" {{ $paramedic->active || old('active', 0) === 1 ? 'checked' : '' }} required>
                    <label class="required form-check-label" for="active">{{ trans('cruds.paramedic.fields.active') }}</label>
                </div>
                @if($errors->has('active'))
                    <div class="invalid-feedback">
                        {{ $errors->first('active') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.paramedic.fields.active_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="from_time">{{ trans('cruds.paramedic.fields.from_time') }}</label>
                <input class="form-control timepicker {{ $errors->has('from_time') ? 'is-invalid' : '' }}" type="text" name="from_time" id="from_time" value="{{ old('from_time', $paramedic->from_time) }}" required>
                @if($errors->has('from_time'))
                    <div class="invalid-feedback">
                        {{ $errors->first('from_time') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.paramedic.fields.from_time_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="to_time">{{ trans('cruds.paramedic.fields.to_time') }}</label>
                <input class="form-control timepicker {{ $errors->has('to_time') ? 'is-invalid' : '' }}" type="text" name="to_time" id="to_time" value="{{ old('to_time', $paramedic->to_time) }}" required>
                @if($errors->has('to_time'))
                    <div class="invalid-feedback">
                        {{ $errors->first('to_time') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.paramedic.fields.to_time_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="affiliation_link">{{ trans('cruds.paramedic.fields.affiliation_link') }}</label>
                <input class="form-control {{ $errors->has('affiliation_link') ? 'is-invalid' : '' }}" type="text" name="affiliation_link" id="affiliation_link" value="{{ old('affiliation_link', $paramedic->affiliation_link) }}" required>
                @if($errors->has('affiliation_link'))
                    <div class="invalid-feedback">
                        {{ $errors->first('affiliation_link') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.paramedic.fields.affiliation_link_helper') }}</span>
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