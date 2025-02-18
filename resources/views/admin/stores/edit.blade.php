@extends('layouts.admin')
@section('content')
    <form method="POST" action="{{ route('admin.stores.update', [$store->id]) }}" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <input type="hidden" name="user_id" value="{{ $user->id }}" id="">

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        {{ trans('global.edit') }} {{ trans('cruds.user.title_singular') }}
                    </div>

                    <div class="card-body">
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
                                <label class="required" for="password">{{ trans('cruds.user.fields.password') }}</label>
                                <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                                    type="password" name="password" id="password">
                                @if ($errors->has('password'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('password') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.user.fields.password_helper') }}</span>
                            </div> 
                            <div class="form-group col-md-6">
                                <label for="identity_num">{{ trans('cruds.user.fields.identity_num') }}</label>
                                <input class="form-control {{ $errors->has('identity_num') ? 'is-invalid' : '' }}"
                                    type="text" name="identity_num" id="identity_num"
                                    value="{{ old('identity_num', $user->identity_num) }}">
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
                                <label for="user_position">{{ trans('cruds.user.fields.user_position') }}</label>
                                <input class="form-control {{ $errors->has('user_position') ? 'is-invalid' : '' }}"
                                    type="text" name="user_position" id="user_position"
                                    value="{{ old('user_position', $user->user_position) }}">
                                @if ($errors->has('user_position'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('user_position') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.user.fields.user_position_helper') }}</span>
                            </div>
                            <div class="form-group col-md-12">
                                <label
                                    for="commercial_register_photo">{{ trans('cruds.store.fields.commercial_register_photo') }}</label>
                                <div class="needsclick dropzone {{ $errors->has('commercial_register_photo') ? 'is-invalid' : '' }}"
                                    id="commercial_register_photo-dropzone">
                                </div>
                                @if ($errors->has('commercial_register_photo'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('commercial_register_photo') }}
                                    </div>
                                @endif
                                <span
                                    class="help-block">{{ trans('cruds.store.fields.commercial_register_photo_helper') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        بيانات المتجر
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label class="required"
                                    for="store_name">{{ trans('cruds.store.fields.store_name') }}</label>
                                <input class="form-control {{ $errors->has('store_name') ? 'is-invalid' : '' }}"
                                    type="text" name="store_name" id="store_name"
                                    value="{{ old('store_name', $store->store_name) }}" required>
                                @if ($errors->has('store_name'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('store_name') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.store.fields.store_name_helper') }}</span>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="store_phone">{{ trans('cruds.store.fields.store_phone') }}</label>
                                <input class="form-control {{ $errors->has('store_phone') ? 'is-invalid' : '' }}"
                                    type="text" name="store_phone" id="store_phone"
                                    value="{{ old('store_phone', $store->store_phone) }}">
                                @if ($errors->has('store_phone'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('store_phone') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.store.fields.store_phone_helper') }}</span>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="address">{{ trans('cruds.store.fields.address') }}</label>
                                <input class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}"
                                    type="text" name="address" id="address"
                                    value="{{ old('address', $store->address) }}">
                                @if ($errors->has('address'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('address') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.store.fields.address_helper') }}</span>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="domain">{{ trans('cruds.store.fields.domain') }}</label>
                                <input class="form-control {{ $errors->has('domain') ? 'is-invalid' : '' }}"
                                    type="text" name="domain" id="domain"
                                    value="{{ old('domain', $store->domain) }}">
                                @if ($errors->has('domain'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('domain') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.store.fields.domain_helper') }}</span>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="required" for="logo">{{ trans('cruds.store.fields.logo') }}</label>
                                <div class="needsclick dropzone {{ $errors->has('logo') ? 'is-invalid' : '' }}"
                                    id="logo-dropzone">
                                </div>
                                @if ($errors->has('logo'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('logo') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.store.fields.logo_helper') }}</span>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="cover">{{ trans('cruds.store.fields.cover') }}</label>
                                <div class="needsclick dropzone {{ $errors->has('cover') ? 'is-invalid' : '' }}"
                                    id="cover-dropzone">
                                </div>
                                @if ($errors->has('cover'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('cover') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.store.fields.cover_helper') }}</span>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="specializations">{{ trans('cruds.store.fields.specializations') }}</label>
                                <div style="padding-bottom: 4px">
                                    <span class="btn btn-info btn-xs select-all"
                                        style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                    <span class="btn btn-info btn-xs deselect-all"
                                        style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                                </div>
                                <select
                                    class="form-control select2 {{ $errors->has('specializations') ? 'is-invalid' : '' }}"
                                    name="specializations[]" id="specializations" multiple>
                                    @foreach ($specializations as $id => $specialization)
                                        <option value="{{ $id }}"
                                            {{ in_array($id, old('specializations', [])) || $store->specializations->contains($id) ? 'selected' : '' }}>
                                            {{ $specialization }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('specializations'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('specializations') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.store.fields.specializations_helper') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <button class="btn btn-danger" type="submit">
                {{ trans('global.save') }}
            </button>
        </div>
    </form>
@endsection

@section('scripts')
    <script>
        Dropzone.options.logoDropzone = {
            url: '{{ route('admin.stores.storeMedia') }}',
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
            success: function(file, response) {
                $('form').find('input[name="logo"]').remove()
                $('form').append('<input type="hidden" name="logo" value="' + response.name + '">')
            },
            removedfile: function(file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('form').find('input[name="logo"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function() {
                @if (isset($store) && $store->logo)
                    var file = {!! json_encode($store->logo) !!}
                    this.options.addedfile.call(this, file)
                    this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
                    file.previewElement.classList.add('dz-complete')
                    $('form').append('<input type="hidden" name="logo" value="' + file.file_name + '">')
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
        Dropzone.options.coverDropzone = {
            url: '{{ route('admin.stores.storeMedia') }}',
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
            success: function(file, response) {
                $('form').find('input[name="cover"]').remove()
                $('form').append('<input type="hidden" name="cover" value="' + response.name + '">')
            },
            removedfile: function(file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('form').find('input[name="cover"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function() {
                @if (isset($store) && $store->cover)
                    var file = {!! json_encode($store->cover) !!}
                    this.options.addedfile.call(this, file)
                    this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
                    file.previewElement.classList.add('dz-complete')
                    $('form').append('<input type="hidden" name="cover" value="' + file.file_name + '">')
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
            success: function(file, response) {
                $('form').find('input[name="commercial_register_photo"]').remove()
                $('form').append('<input type="hidden" name="commercial_register_photo" value="' + response.name +
                    '">')
            },
            removedfile: function(file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('form').find('input[name="commercial_register_photo"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function() {
                @if (isset($store) && $store->commercial_register_photo)
                    var file = {!! json_encode($store->commercial_register_photo) !!}
                    this.options.addedfile.call(this, file)
                    file.previewElement.classList.add('dz-complete')
                    $('form').append('<input type="hidden" name="commercial_register_photo" value="' + file
                        .file_name + '">')
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
@endsection
