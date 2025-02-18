@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.clinic.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.clinics.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="clinic_name">{{ trans('cruds.clinic.fields.clinic_name') }}</label>
                <input class="form-control {{ $errors->has('clinic_name') ? 'is-invalid' : '' }}" type="text" name="clinic_name" id="clinic_name" value="{{ old('clinic_name', '') }}" required>
                @if($errors->has('clinic_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('clinic_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.clinic.fields.clinic_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="clinic_phone">{{ trans('cruds.clinic.fields.clinic_phone') }}</label>
                <input class="form-control {{ $errors->has('clinic_phone') ? 'is-invalid' : '' }}" type="text" name="clinic_phone" id="clinic_phone" value="{{ old('clinic_phone', '') }}">
                @if($errors->has('clinic_phone'))
                    <div class="invalid-feedback">
                        {{ $errors->first('clinic_phone') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.clinic.fields.clinic_phone_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="unified_phone">{{ trans('cruds.clinic.fields.unified_phone') }}</label>
                <input class="form-control {{ $errors->has('unified_phone') ? 'is-invalid' : '' }}" type="text" name="unified_phone" id="unified_phone" value="{{ old('unified_phone', '') }}">
                @if($errors->has('unified_phone'))
                    <div class="invalid-feedback">
                        {{ $errors->first('unified_phone') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.clinic.fields.unified_phone_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="short_description">{{ trans('cruds.clinic.fields.short_description') }}</label>
                <input class="form-control {{ $errors->has('short_description') ? 'is-invalid' : '' }}" type="text" name="short_description" id="short_description" value="{{ old('short_description', '') }}">
                @if($errors->has('short_description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('short_description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.clinic.fields.short_description_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="address">{{ trans('cruds.clinic.fields.address') }}</label>
                <input class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" type="text" name="address" id="address" value="{{ old('address', '') }}">
                @if($errors->has('address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('address') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.clinic.fields.address_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cover">{{ trans('cruds.clinic.fields.cover') }}</label>
                <div class="needsclick dropzone {{ $errors->has('cover') ? 'is-invalid' : '' }}" id="cover-dropzone">
                </div>
                @if($errors->has('cover'))
                    <div class="invalid-feedback">
                        {{ $errors->first('cover') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.clinic.fields.cover_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="logo">{{ trans('cruds.clinic.fields.logo') }}</label>
                <div class="needsclick dropzone {{ $errors->has('logo') ? 'is-invalid' : '' }}" id="logo-dropzone">
                </div>
                @if($errors->has('logo'))
                    <div class="invalid-feedback">
                        {{ $errors->first('logo') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.clinic.fields.logo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="about_us">{{ trans('cruds.clinic.fields.about_us') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('about_us') ? 'is-invalid' : '' }}" name="about_us" id="about_us">{!! old('about_us') !!}</textarea>
                @if($errors->has('about_us'))
                    <div class="invalid-feedback">
                        {{ $errors->first('about_us') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.clinic.fields.about_us_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="about_us_image">{{ trans('cruds.clinic.fields.about_us_image') }}</label>
                <div class="needsclick dropzone {{ $errors->has('about_us_image') ? 'is-invalid' : '' }}" id="about_us_image-dropzone">
                </div>
                @if($errors->has('about_us_image'))
                    <div class="invalid-feedback">
                        {{ $errors->first('about_us_image') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.clinic.fields.about_us_image_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="user_id">{{ trans('cruds.clinic.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id">
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ old('user_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <div class="invalid-feedback">
                        {{ $errors->first('user') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.clinic.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="certification">{{ trans('cruds.clinic.fields.certification') }}</label>
                <div class="needsclick dropzone {{ $errors->has('certification') ? 'is-invalid' : '' }}" id="certification-dropzone">
                </div>
                @if($errors->has('certification'))
                    <div class="invalid-feedback">
                        {{ $errors->first('certification') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.clinic.fields.certification_helper') }}</span>
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

@section('scripts')
<script>
    Dropzone.options.coverDropzone = {
    url: '{{ route('admin.clinics.storeMedia') }}',
    maxFilesize: 5, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 5,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="cover"]').remove()
      $('form').append('<input type="hidden" name="cover" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="cover"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($clinic) && $clinic->cover)
      var file = {!! json_encode($clinic->cover) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="cover" value="' + file.file_name + '">')
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
<script>
    Dropzone.options.logoDropzone = {
    url: '{{ route('admin.clinics.storeMedia') }}',
    maxFilesize: 5, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 5,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="logo"]').remove()
      $('form').append('<input type="hidden" name="logo" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="logo"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($clinic) && $clinic->logo)
      var file = {!! json_encode($clinic->logo) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="logo" value="' + file.file_name + '">')
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
<script>
    $(document).ready(function () {
  function SimpleUploadAdapter(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
      return {
        upload: function() {
          return loader.file
            .then(function (file) {
              return new Promise(function(resolve, reject) {
                // Init request
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '{{ route('admin.clinics.storeCKEditorImages') }}', true);
                xhr.setRequestHeader('x-csrf-token', window._token);
                xhr.setRequestHeader('Accept', 'application/json');
                xhr.responseType = 'json';

                // Init listeners
                var genericErrorText = `Couldn't upload file: ${ file.name }.`;
                xhr.addEventListener('error', function() { reject(genericErrorText) });
                xhr.addEventListener('abort', function() { reject() });
                xhr.addEventListener('load', function() {
                  var response = xhr.response;

                  if (!response || xhr.status !== 201) {
                    return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                  }

                  $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                  resolve({ default: response.url });
                });

                if (xhr.upload) {
                  xhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                      loader.uploadTotal = e.total;
                      loader.uploaded = e.loaded;
                    }
                  });
                }

                // Send request
                var data = new FormData();
                data.append('upload', file);
                data.append('crud_id', '{{ $clinic->id ?? 0 }}');
                xhr.send(data);
              });
            })
        }
      };
    }
  }

  var allEditors = document.querySelectorAll('.ckeditor');
  for (var i = 0; i < allEditors.length; ++i) {
    ClassicEditor.create(
      allEditors[i], {
        extraPlugins: [SimpleUploadAdapter]
      }
    );
  }
});
</script>

<script>
    Dropzone.options.aboutUsImageDropzone = {
    url: '{{ route('admin.clinics.storeMedia') }}',
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
      $('form').find('input[name="about_us_image"]').remove()
      $('form').append('<input type="hidden" name="about_us_image" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="about_us_image"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($clinic) && $clinic->about_us_image)
      var file = {!! json_encode($clinic->about_us_image) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="about_us_image" value="' + file.file_name + '">')
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
<script>
    Dropzone.options.certificationDropzone = {
    url: '{{ route('admin.clinics.storeMedia') }}',
    maxFilesize: 5, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 5
    },
    success: function (file, response) {
      $('form').find('input[name="certification"]').remove()
      $('form').append('<input type="hidden" name="certification" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="certification"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($clinic) && $clinic->certification)
      var file = {!! json_encode($clinic->certification) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="certification" value="' + file.file_name + '">')
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