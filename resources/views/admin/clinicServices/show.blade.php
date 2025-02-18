@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.clinicService.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.clinic-services.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.clinicService.fields.id') }}
                        </th>
                        <td>
                            {{ $clinicService->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clinicService.fields.name') }}
                        </th>
                        <td>
                            {{ $clinicService->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clinicService.fields.photo') }}
                        </th>
                        <td>
                            @if($clinicService->photo)
                                <a href="{{ $clinicService->photo->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $clinicService->photo->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clinicService.fields.short_description') }}
                        </th>
                        <td>
                            {{ $clinicService->short_description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clinicService.fields.banner') }}
                        </th>
                        <td>
                            @if($clinicService->banner)
                                <a href="{{ $clinicService->banner->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $clinicService->banner->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clinicService.fields.description') }}
                        </th>
                        <td>
                            {!! $clinicService->description !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clinicService.fields.affiliation_link') }}
                        </th>
                        <td>
                            {{ $clinicService->affiliation_link }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clinicService.fields.clinic') }}
                        </th>
                        <td>
                            {{ $clinicService->clinic->clinic_name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.clinic-services.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection