@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.adoptionPet.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.adoption-pets.update", [$adoptionPet->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="user_id">{{ trans('cruds.adoptionPet.fields.user') }}</label>
                            <select class="form-control select2" name="user_id" id="user_id" required>
                                @foreach($users as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('user_id') ? old('user_id') : $adoptionPet->user->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('user'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('user') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.adoptionPet.fields.user_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="name">{{ trans('cruds.adoptionPet.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', $adoptionPet->name) }}" required>
                            @if($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.adoptionPet.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="pet_type_id">{{ trans('cruds.adoptionPet.fields.pet_type') }}</label>
                            <select class="form-control select2" name="pet_type_id" id="pet_type_id" required>
                                @foreach($pet_types as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('pet_type_id') ? old('pet_type_id') : $adoptionPet->pet_type->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('pet_type'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('pet_type') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.adoptionPet.fields.pet_type_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="fasila">{{ trans('cruds.adoptionPet.fields.fasila') }}</label>
                            <input class="form-control" type="text" name="fasila" id="fasila" value="{{ old('fasila', $adoptionPet->fasila) }}" required>
                            @if($errors->has('fasila'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('fasila') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.adoptionPet.fields.fasila_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="age">{{ trans('cruds.adoptionPet.fields.age') }}</label>
                            <input class="form-control" type="text" name="age" id="age" value="{{ old('age', $adoptionPet->age) }}" required>
                            @if($errors->has('age'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('age') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.adoptionPet.fields.age_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="photo">{{ trans('cruds.adoptionPet.fields.photo') }}</label>
                            <div class="needsclick dropzone" id="photo-dropzone">
                            </div>
                            @if($errors->has('photo'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('photo') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.adoptionPet.fields.photo_helper') }}</span>
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

@section('scripts')
<script>
    Dropzone.options.photoDropzone = {
    url: '{{ route('frontend.adoption-pets.storeMedia') }}',
    maxFilesize: 4, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 4,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="photo"]').remove()
      $('form').append('<input type="hidden" name="photo" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="photo"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($adoptionPet) && $adoptionPet->photo)
      var file = {!! json_encode($adoptionPet->photo) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="photo" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}

</script>
@endsection