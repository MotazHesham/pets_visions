@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.clinic.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.clinics.index') }}">
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
                            {{ trans('cruds.user.fields.name') }}
                        </th>
                        <td>
                            {{ $user->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.email') }}
                        </th>
                        <td>
                            {{ $user->email }}
                        </td>
                    </tr> 
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.approved') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $user->approved ? 'checked' : '' }}>
                        </td>
                    </tr> 
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.identity_num') }}
                        </th>
                        <td>
                            {{ $user->identity_num }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.phone') }}
                        </th>
                        <td>
                            {{ $user->phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.user_position') }}
                        </th>
                        <td>
                            {{ $user->user_position }}
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
                <a class="btn btn-default" href="{{ route('admin.clinics.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#clinic_clinic_services" role="tab" data-toggle="tab">
                {{ trans('cruds.clinicService.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#clinic_clinic_reviews" role="tab" data-toggle="tab">
                {{ trans('cruds.clinicReview.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="clinic_clinic_services">
            @includeIf('admin.clinics.relationships.clinicClinicServices', ['clinicServices' => $clinic->clinicClinicServices])
        </div>
        <div class="tab-pane" role="tabpanel" id="clinic_clinic_reviews">
            @includeIf('admin.clinics.relationships.clinicClinicReviews', ['clinicReviews' => $clinic->clinicClinicReviews])
        </div>
    </div>
</div>

@endsection