@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.hosting.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.hostings.update", [$hosting->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="user_id">{{ trans('cruds.hosting.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id">
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ (old('user_id') ? old('user_id') : $hosting->user->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <div class="invalid-feedback">
                        {{ $errors->first('user') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.hosting.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="hosting_name">{{ trans('cruds.hosting.fields.hosting_name') }}</label>
                <input class="form-control {{ $errors->has('hosting_name') ? 'is-invalid' : '' }}" type="text" name="hosting_name" id="hosting_name" value="{{ old('hosting_name', $hosting->hosting_name) }}">
                @if($errors->has('hosting_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('hosting_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.hosting.fields.hosting_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="hosting_phone">{{ trans('cruds.hosting.fields.hosting_phone') }}</label>
                <input class="form-control {{ $errors->has('hosting_phone') ? 'is-invalid' : '' }}" type="text" name="hosting_phone" id="hosting_phone" value="{{ old('hosting_phone', $hosting->hosting_phone) }}" required>
                @if($errors->has('hosting_phone'))
                    <div class="invalid-feedback">
                        {{ $errors->first('hosting_phone') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.hosting.fields.hosting_phone_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.hosting.fields.hosting_type') }}</label>
                <select class="form-control {{ $errors->has('hosting_type') ? 'is-invalid' : '' }}" name="hosting_type" id="hosting_type" required>
                    <option value disabled {{ old('hosting_type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Hosting::HOSTING_TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('hosting_type', $hosting->hosting_type) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('hosting_type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('hosting_type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.hosting.fields.hosting_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="address">{{ trans('cruds.hosting.fields.address') }}</label>
                <input class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" type="text" name="address" id="address" value="{{ old('address', $hosting->address) }}">
                @if($errors->has('address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('address') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.hosting.fields.address_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="about_us">{{ trans('cruds.hosting.fields.about_us') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('about_us') ? 'is-invalid' : '' }}" name="about_us" id="about_us">{!! old('about_us', $hosting->about_us) !!}</textarea>
                @if($errors->has('about_us'))
                    <div class="invalid-feedback">
                        {{ $errors->first('about_us') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.hosting.fields.about_us_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="short_description">{{ trans('cruds.hosting.fields.short_description') }}</label>
                <textarea class="form-control {{ $errors->has('short_description') ? 'is-invalid' : '' }}" name="short_description" id="short_description">{{ old('short_description', $hosting->short_description) }}</textarea>
                @if($errors->has('short_description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('short_description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.hosting.fields.short_description_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="logo">{{ trans('cruds.hosting.fields.logo') }}</label>
                <div class="needsclick dropzone {{ $errors->has('logo') ? 'is-invalid' : '' }}" id="logo-dropzone">
                </div>
                @if($errors->has('logo'))
                    <div class="invalid-feedback">
                        {{ $errors->first('logo') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.hosting.fields.logo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cover">{{ trans('cruds.hosting.fields.cover') }}</label>
                <div class="needsclick dropzone {{ $errors->has('cover') ? 'is-invalid' : '' }}" id="cover-dropzone">
                </div>
                @if($errors->has('cover'))
                    <div class="invalid-feedback">
                        {{ $errors->first('cover') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.hosting.fields.cover_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="affiliation_link">{{ trans('cruds.hosting.fields.affiliation_link') }}</label>
                <input class="form-control {{ $errors->has('affiliation_link') ? 'is-invalid' : '' }}" type="text" name="affiliation_link" id="affiliation_link" value="{{ old('affiliation_link', $hosting->affiliation_link) }}" required>
                @if($errors->has('affiliation_link'))
                    <div class="invalid-feedback">
                        {{ $errors->first('affiliation_link') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.hosting.fields.affiliation_link_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="photos">{{ trans('cruds.hosting.fields.photos') }}</label>
                <div class="needsclick dropzone {{ $errors->has('photos') ? 'is-invalid' : '' }}" id="photos-dropzone">
                </div>
                @if($errors->has('photos'))
                    <div class="invalid-feedback">
                        {{ $errors->first('photos') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.hosting.fields.photos_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="identity_photo">{{ trans('cruds.hosting.fields.identity_photo') }}</label>
                <div class="needsclick dropzone {{ $errors->has('identity_photo') ? 'is-invalid' : '' }}" id="identity_photo-dropzone">
                </div>
                @if($errors->has('identity_photo'))
                    <div class="invalid-feedback">
                        {{ $errors->first('identity_photo') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.hosting.fields.identity_photo_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="hosting_services">{{ trans('cruds.hosting.fields.hosting_services') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('hosting_services') ? 'is-invalid' : '' }}" name="hosting_services[]" id="hosting_services" multiple required>
                    @foreach($hosting_services as $id => $hosting_service)
                        <option value="{{ $id }}" {{ (in_array($id, old('hosting_services', [])) || $hosting->hosting_services->contains($id)) ? 'selected' : '' }}>{{ $hosting_service }}</option>
                    @endforeach
                </select>
                @if($errors->has('hosting_services'))
                    <div class="invalid-feedback">
                        {{ $errors->first('hosting_services') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.hosting.fields.hosting_services_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="commercial_register_photo">{{ trans('cruds.hosting.fields.commercial_register_photo') }}</label>
                <div class="needsclick dropzone {{ $errors->has('commercial_register_photo') ? 'is-invalid' : '' }}" id="commercial_register_photo-dropzone">
                </div>
                @if($errors->has('commercial_register_photo'))
                    <div class="invalid-feedback">
                        {{ $errors->first('commercial_register_photo') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.hosting.fields.commercial_register_photo_helper') }}</span>
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
                xhr.open('POST', '{{ route('admin.hostings.storeCKEditorImages') }}', true);
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
                data.append('crud_id', '{{ $hosting->id ?? 0 }}');
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
    Dropzone.options.logoDropzone = {
    url: '{{ route('admin.hostings.storeMedia') }}',
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
@if(isset($hosting) && $hosting->logo)
      var file = {!! json_encode($hosting->logo) !!}
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
    Dropzone.options.coverDropzone = {
    url: '{{ route('admin.hostings.storeMedia') }}',
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
@if(isset($hosting) && $hosting->cover)
      var file = {!! json_encode($hosting->cover) !!}
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
    var uploadedPhotosMap = {}
Dropzone.options.photosDropzone = {
    url: '{{ route('admin.hostings.storeMedia') }}',
    maxFilesize: 4, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
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
      $('form').append('<input type="hidden" name="photos[]" value="' + response.name + '">')
      uploadedPhotosMap[file.name] = response.name
    },
    removedfile: function (file) {
      console.log(file)
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedPhotosMap[file.name]
      }
      $('form').find('input[name="photos[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($hosting) && $hosting->photos)
      var files = {!! json_encode($hosting->photos) !!}
          for (var i in files) {
          var file = files[i]
          this.options.addedfile.call(this, file)
          this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="photos[]" value="' + file.file_name + '">')
        }
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
    Dropzone.options.identityPhotoDropzone = {
    url: '{{ route('admin.hostings.storeMedia') }}',
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
      $('form').find('input[name="identity_photo"]').remove()
      $('form').append('<input type="hidden" name="identity_photo" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="identity_photo"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($hosting) && $hosting->identity_photo)
      var file = {!! json_encode($hosting->identity_photo) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="identity_photo" value="' + file.file_name + '">')
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
    Dropzone.options.commercialRegisterPhotoDropzone = {
    url: '{{ route('admin.hostings.storeMedia') }}',
    maxFilesize: 4, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 4
    },
    success: function (file, response) {
      $('form').find('input[name="commercial_register_photo"]').remove()
      $('form').append('<input type="hidden" name="commercial_register_photo" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="commercial_register_photo"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($hosting) && $hosting->commercial_register_photo)
      var file = {!! json_encode($hosting->commercial_register_photo) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="commercial_register_photo" value="' + file.file_name + '">')
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