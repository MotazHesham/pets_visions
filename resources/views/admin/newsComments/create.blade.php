@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.newsComment.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.news-comments.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="news_id">{{ trans('cruds.newsComment.fields.news') }}</label>
                <select class="form-control select2 {{ $errors->has('news') ? 'is-invalid' : '' }}" name="news_id" id="news_id">
                    @foreach($news as $id => $entry)
                        <option value="{{ $id }}" {{ old('news_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('news'))
                    <div class="invalid-feedback">
                        {{ $errors->first('news') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.newsComment.fields.news_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.newsComment.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.newsComment.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="comment">{{ trans('cruds.newsComment.fields.comment') }}</label>
                <input class="form-control {{ $errors->has('comment') ? 'is-invalid' : '' }}" type="text" name="comment" id="comment" value="{{ old('comment', '') }}">
                @if($errors->has('comment'))
                    <div class="invalid-feedback">
                        {{ $errors->first('comment') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.newsComment.fields.comment_helper') }}</span>
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