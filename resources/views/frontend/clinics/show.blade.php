@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.clinic.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.clinics.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.clinic.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $clinic->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.clinic.fields.clinic_name') }}
                                    </th>
                                    <td>
                                        {{ $clinic->clinic_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.clinic.fields.clinic_phone') }}
                                    </th>
                                    <td>
                                        {{ $clinic->clinic_phone }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.clinic.fields.unified_phone') }}
                                    </th>
                                    <td>
                                        {{ $clinic->unified_phone }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.clinic.fields.short_description') }}
                                    </th>
                                    <td>
                                        {{ $clinic->short_description }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.clinic.fields.address') }}
                                    </th>
                                    <td>
                                        {{ $clinic->address }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.clinic.fields.cover') }}
                                    </th>
                                    <td>
                                        @if($clinic->cover)
                                            <a href="{{ $clinic->cover->getUrl() }}" target="_blank" style="display: inline-block">
                                                <img src="{{ $clinic->cover->getUrl('thumb') }}">
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.clinic.fields.logo') }}
                                    </th>
                                    <td>
                                        @if($clinic->logo)
                                            <a href="{{ $clinic->logo->getUrl() }}" target="_blank" style="display: inline-block">
                                                <img src="{{ $clinic->logo->getUrl('thumb') }}">
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.clinic.fields.about_us') }}
                                    </th>
                                    <td>
                                        {!! $clinic->about_us !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.clinic.fields.about_us_image') }}
                                    </th>
                                    <td>
                                        @if($clinic->about_us_image)
                                            <a href="{{ $clinic->about_us_image->getUrl() }}" target="_blank" style="display: inline-block">
                                                <img src="{{ $clinic->about_us_image->getUrl('thumb') }}">
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.clinic.fields.user') }}
                                    </th>
                                    <td>
                                        {{ $clinic->user->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.clinic.fields.rating') }}
                                    </th>
                                    <td>
                                        {{ $clinic->rating }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.clinic.fields.certification') }}
                                    </th>
                                    <td>
                                        @if($clinic->certification)
                                            <a href="{{ $clinic->certification->getUrl() }}" target="_blank">
                                                {{ trans('global.view_file') }}
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.clinics.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection