@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.edit') }} {{ trans('cruds.petCompanion.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.pet-companions.update', [$petCompanion->id]) }}"
                enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <input type="hidden" name="user_id" value="{{ $user->id }}" id="">

                <div class="row">
                    <div class="form-group col-md-6">
                        <label class="required" for="name">{{ trans('cruds.user.fields.name') }}</label>
                        <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text"
                            name="name" id="name" value="{{ old('name', $user->name) }}" required>
                        @if ($errors->has('name'))
                            <div class="invalid-feedback">
                                {{ $errors->first('name') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.user.fields.name_helper') }}</span>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="required" for="email">{{ trans('cruds.user.fields.email') }}</label>
                        <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email"
                            name="email" id="email" value="{{ old('email', $user->email) }}" required>
                        @if ($errors->has('email'))
                            <div class="invalid-feedback">
                                {{ $errors->first('email') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.user.fields.email_helper') }}</span>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="password">{{ trans('cruds.user.fields.password') }}</label>
                        <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" type="password"
                            name="password" id="password">
                        @if ($errors->has('password'))
                            <div class="invalid-feedback">
                                {{ $errors->first('password') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.user.fields.password_helper') }}</span>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="identity_num">{{ trans('cruds.user.fields.identity_num') }}</label>
                        <input class="form-control {{ $errors->has('identity_num') ? 'is-invalid' : '' }}" type="text"
                            name="identity_num" id="identity_num" value="{{ old('identity_num', $user->identity_num) }}">
                        @if ($errors->has('identity_num'))
                            <div class="invalid-feedback">
                                {{ $errors->first('identity_num') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.user.fields.identity_num_helper') }}</span>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="phone">{{ trans('cruds.user.fields.phone') }}</label>
                        <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text"
                            name="phone" id="phone" value="{{ old('phone', $user->phone) }}">
                        @if ($errors->has('phone'))
                            <div class="invalid-feedback">
                                {{ $errors->first('phone') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.user.fields.phone_helper') }}</span>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="nationality">{{ trans('cruds.petCompanion.fields.nationality') }}</label>
                        <input class="form-control {{ $errors->has('nationality') ? 'is-invalid' : '' }}" type="text"
                            name="nationality" id="nationality"
                            value="{{ old('nationality', $petCompanion->nationality) }}">
                        @if ($errors->has('nationality'))
                            <div class="invalid-feedback">
                                {{ $errors->first('nationality') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.petCompanion.fields.nationality_helper') }}</span>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="required"
                            for="affiliation_link">{{ trans('cruds.petCompanion.fields.affiliation_link') }}</label>
                        <input class="form-control {{ $errors->has('affiliation_link') ? 'is-invalid' : '' }}"
                            type="text" name="affiliation_link" id="affiliation_link"
                            value="{{ old('affiliation_link', $petCompanion->affiliation_link) }}" required>
                        @if ($errors->has('affiliation_link'))
                            <div class="invalid-feedback">
                                {{ $errors->first('affiliation_link') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.petCompanion.fields.affiliation_link_helper') }}</span>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="required"
                            for="specializations">{{ trans('cruds.petCompanion.fields.specializations') }}</label>
                        <div style="padding-bottom: 4px">
                            <span class="btn btn-info btn-xs select-all"
                                style="border-radius: 0">{{ trans('global.select_all') }}</span>
                            <span class="btn btn-info btn-xs deselect-all"
                                style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                        </div>
                        <select class="form-control select2 {{ $errors->has('specializations') ? 'is-invalid' : '' }}"
                            name="specializations[]" id="specializations" multiple required>
                            @foreach ($specializations as $id => $specialization)
                                <option value="{{ $id }}"
                                    {{ in_array($id, old('specializations', [])) || $petCompanion->specializations->contains($id) ? 'selected' : '' }}>
                                    {{ $specialization }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('specializations'))
                            <div class="invalid-feedback">
                                {{ $errors->first('specializations') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.petCompanion.fields.specializations_helper') }}</span>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="photo">{{ trans('cruds.petCompanion.fields.photo') }}</label>
                        <div class="needsclick dropzone {{ $errors->has('photo') ? 'is-invalid' : '' }}"
                            id="photo-dropzone">
                        </div>
                        @if ($errors->has('photo'))
                            <div class="invalid-feedback">
                                {{ $errors->first('photo') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.petCompanion.fields.photo_helper') }}</span>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="experience">{{ trans('cruds.petCompanion.fields.experience') }}</label>
                        <textarea class="form-control ckeditor {{ $errors->has('experience') ? 'is-invalid' : '' }}" name="experience"
                            id="experience">{!! old('experience', $petCompanion->experience) !!}</textarea>
                        @if ($errors->has('experience'))
                            <div class="invalid-feedback">
                                {{ $errors->first('experience') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.petCompanion.fields.experience_helper') }}</span>
                    </div>
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
        Dropzone.options.photoDropzone = {
            url: '{{ route('admin.pet-companions.storeMedia') }}',
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
            success: function(file, response) {
                $('form').find('input[name="photo"]').remove()
                $('form').append('<input type="hidden" name="photo" value="' + response.name + '">')
            },
            removedfile: function(file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('form').find('input[name="photo"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function() {
                @if (isset($petCompanion) && $petCompanion->photo)
                    var file = {!! json_encode($petCompanion->photo) !!}
                    this.options.addedfile.call(this, file)
                    this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
                    file.previewElement.classList.add('dz-complete')
                    $('form').append('<input type="hidden" name="photo" value="' + file.file_name + '">')
                    this.options.maxFiles = this.options.maxFiles - 1
                @endif
            },
            error: function(file, response) {
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
        $(document).ready(function() {
            function SimpleUploadAdapter(editor) {
                editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
                    return {
                        upload: function() {
                            return loader.file
                                .then(function(file) {
                                    return new Promise(function(resolve, reject) {
                                        // Init request
                                        var xhr = new XMLHttpRequest();
                                        xhr.open('POST',
                                            '{{ route('admin.pet-companions.storeCKEditorImages') }}',
                                            true);
                                        xhr.setRequestHeader('x-csrf-token', window._token);
                                        xhr.setRequestHeader('Accept', 'application/json');
                                        xhr.responseType = 'json';

                                        // Init listeners
                                        var genericErrorText =
                                            `Couldn't upload file: ${ file.name }.`;
                                        xhr.addEventListener('error', function() {
                                            reject(genericErrorText)
                                        });
                                        xhr.addEventListener('abort', function() {
                                            reject()
                                        });
                                        xhr.addEventListener('load', function() {
                                            var response = xhr.response;

                                            if (!response || xhr.status !== 201) {
                                                return reject(response && response
                                                    .message ?
                                                    `${genericErrorText}\n${xhr.status} ${response.message}` :
                                                    `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`
                                                );
                                            }

                                            $('form').append(
                                                '<input type="hidden" name="ck-media[]" value="' +
                                                response.id + '">');

                                            resolve({
                                                default: response.url
                                            });
                                        });

                                        if (xhr.upload) {
                                            xhr.upload.addEventListener('progress', function(
                                                e) {
                                                if (e.lengthComputable) {
                                                    loader.uploadTotal = e.total;
                                                    loader.uploaded = e.loaded;
                                                }
                                            });
                                        }

                                        // Send request
                                        var data = new FormData();
                                        data.append('upload', file);
                                        data.append('crud_id', '{{ $petCompanion->id ?? 0 }}');
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
@endsection
