@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.edit') }} {{ trans('cruds.product.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.products.update', [$product->id]) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="form-group col-md-3">
                        <label for="store_id">{{ trans('cruds.product.fields.store') }}</label>
                        <select class="form-control select2 {{ $errors->has('store') ? 'is-invalid' : '' }}"
                            name="store_id" id="store_id">
                            @foreach ($stores as $id => $entry)
                                <option value="{{ $id }}"
                                    {{ (old('store_id') ? old('store_id') : $product->store->id ?? '') == $id ? 'selected' : '' }}>
                                    {{ $entry }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('store'))
                            <div class="invalid-feedback">
                                {{ $errors->first('store') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.product.fields.store_helper') }}</span>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="category_id">{{ trans('cruds.product.fields.category') }}</label>
                        <select class="form-control select2 {{ $errors->has('category') ? 'is-invalid' : '' }}" name="category_id" id="category_id">
                            @foreach($categories as $id => $entry)
                                <option value="{{ $id }}" {{ (old('category_id') ? old('category_id') : $product->category->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('category'))
                            <div class="invalid-feedback">
                                {{ $errors->first('category') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.product.fields.category_helper') }}</span>
                    </div>
                    <div class="form-group col-md-3">
                        <label class="required" for="name">{{ trans('cruds.product.fields.name') }}</label>
                        <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text"
                            name="name" id="name" value="{{ old('name', $product->name) }}" required>
                        @if ($errors->has('name'))
                            <div class="invalid-feedback">
                                {{ $errors->first('name') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.product.fields.name_helper') }}</span>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="current_stock">{{ trans('cruds.product.fields.current_stock') }}</label>
                        <input class="form-control {{ $errors->has('current_stock') ? 'is-invalid' : '' }}" type="number"
                            name="current_stock" id="current_stock"
                            value="{{ old('current_stock', $product->current_stock) }}" step="1">
                        @if ($errors->has('current_stock'))
                            <div class="invalid-feedback">
                                {{ $errors->first('current_stock') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.product.fields.current_stock_helper') }}</span>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="required" for="price">{{ trans('cruds.product.fields.price') }}</label>
                        <input class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" type="number"
                            name="price" id="price" value="{{ old('price', $product->price) }}" step="0.01"
                            required>
                        @if ($errors->has('price'))
                            <div class="invalid-feedback">
                                {{ $errors->first('price') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.product.fields.price_helper') }}</span>
                    </div>
                    <div class="form-group col-md-4">
                        <label>{{ trans('cruds.product.fields.video_provider') }}</label>
                        <select class="form-control {{ $errors->has('video_provider') ? 'is-invalid' : '' }}"
                            name="video_provider" id="video_provider">
                            <option value disabled {{ old('video_provider', null) === null ? 'selected' : '' }}>
                                {{ trans('global.pleaseSelect') }}</option>
                            @foreach (App\Models\Product::VIDEO_PROVIDER_SELECT as $key => $label)
                                <option value="{{ $key }}"
                                    {{ old('video_provider', $product->video_provider) === (string) $key ? 'selected' : '' }}>
                                    {{ $label }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('video_provider'))
                            <div class="invalid-feedback">
                                {{ $errors->first('video_provider') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.product.fields.video_provider_helper') }}</span>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="video_link">{{ trans('cruds.product.fields.video_link') }}</label>
                        <input class="form-control {{ $errors->has('video_link') ? 'is-invalid' : '' }}" type="text"
                            name="video_link" id="video_link" value="{{ old('video_link', $product->video_link) }}">
                        @if ($errors->has('video_link'))
                            <div class="invalid-feedback">
                                {{ $errors->first('video_link') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.product.fields.video_link_helper') }}</span>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="tags">{{ trans('cruds.product.fields.tags') }}</label>
                        <input class="form-control {{ $errors->has('tags') ? 'is-invalid' : '' }}"
                            type="text" name="tags[]" value="{{ $product->tags }}" id="tags" placeholder="add tags ..."
                            data-role="tagsinput">
                        @if ($errors->has('tags'))
                            <div class="invalid-feedback">
                                {{ $errors->first('tags') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.product.fields.tags_helper') }}</span>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="affiliation_link">{{ trans('cruds.product.fields.affiliation_link') }}</label>
                        <input class="form-control {{ $errors->has('affiliation_link') ? 'is-invalid' : '' }}"
                            type="text" name="affiliation_link" id="affiliation_link"
                            value="{{ old('affiliation_link', $product->affiliation_link) }}">
                        @if ($errors->has('affiliation_link'))
                            <div class="invalid-feedback">
                                {{ $errors->first('affiliation_link') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.product.fields.affiliation_link_helper') }}</span>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="meta_title">{{ trans('cruds.product.fields.meta_title') }}</label>
                        <input class="form-control {{ $errors->has('meta_title') ? 'is-invalid' : '' }}" type="text"
                            name="meta_title" id="meta_title" value="{{ old('meta_title', $product->meta_title) }}">
                        @if ($errors->has('meta_title'))
                            <div class="invalid-feedback">
                                {{ $errors->first('meta_title') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.product.fields.meta_title_helper') }}</span>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="meta_description">{{ trans('cruds.product.fields.meta_description') }}</label>
                        <textarea class="form-control {{ $errors->has('meta_description') ? 'is-invalid' : '' }}" name="meta_description"
                            id="meta_description">{{ old('meta_description', $product->meta_description) }}</textarea>
                        @if ($errors->has('meta_description'))
                            <div class="invalid-feedback">
                                {{ $errors->first('meta_description') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.product.fields.meta_description_helper') }}</span>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="description">{{ trans('cruds.product.fields.description') }}</label>
                        <textarea class="form-control ckeditor {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description"
                            id="description">{!! old('description', $product->description) !!}</textarea>
                        @if ($errors->has('description'))
                            <div class="invalid-feedback">
                                {{ $errors->first('description') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.product.fields.description_helper') }}</span>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="details">{{ trans('cruds.product.fields.details') }}</label>
                        <textarea class="form-control ckeditor {{ $errors->has('details') ? 'is-invalid' : '' }}" name="details"
                            id="details">{!! old('details', $product->details) !!}</textarea>
                        @if ($errors->has('details'))
                            <div class="invalid-feedback">
                                {{ $errors->first('details') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.product.fields.details_helper') }}</span>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="main_photo">{{ trans('cruds.product.fields.main_photo') }}</label>
                        <div class="needsclick dropzone {{ $errors->has('main_photo') ? 'is-invalid' : '' }}"
                            id="main_photo-dropzone">
                        </div>
                        @if ($errors->has('main_photo'))
                            <div class="invalid-feedback">
                                {{ $errors->first('main_photo') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.product.fields.main_photo_helper') }}</span>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="photos">{{ trans('cruds.product.fields.photos') }}</label>
                        <div class="needsclick dropzone {{ $errors->has('photos') ? 'is-invalid' : '' }}"
                            id="photos-dropzone">
                        </div>
                        @if ($errors->has('photos'))
                            <div class="invalid-feedback">
                                {{ $errors->first('photos') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.product.fields.photos_helper') }}</span>
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
                                            '{{ route('admin.products.storeCKEditorImages') }}',
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
                                        data.append('crud_id', '{{ $product->id ?? 0 }}');
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
        Dropzone.options.mainPhotoDropzone = {
            url: '{{ route('admin.products.storeMedia') }}',
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
                $('form').find('input[name="main_photo"]').remove()
                $('form').append('<input type="hidden" name="main_photo" value="' + response.name + '">')
            },
            removedfile: function(file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('form').find('input[name="main_photo"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function() {
                @if (isset($product) && $product->main_photo)
                    var file = {!! json_encode($product->main_photo) !!}
                    this.options.addedfile.call(this, file)
                    this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
                    file.previewElement.classList.add('dz-complete')
                    $('form').append('<input type="hidden" name="main_photo" value="' + file.file_name + '">')
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
        var uploadedPhotosMap = {}
        Dropzone.options.photosDropzone = {
            url: '{{ route('admin.products.storeMedia') }}',
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
            success: function(file, response) {
                $('form').append('<input type="hidden" name="photos[]" value="' + response.name + '">')
                uploadedPhotosMap[file.name] = response.name
            },
            removedfile: function(file) {
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
            init: function() {
                @if (isset($product) && $product->photos)
                    var files = {!! json_encode($product->photos) !!}
                    for (var i in files) {
                        var file = files[i]
                        this.options.addedfile.call(this, file)
                        this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
                        file.previewElement.classList.add('dz-complete')
                        $('form').append('<input type="hidden" name="photos[]" value="' + file.file_name + '">')
                    }
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
