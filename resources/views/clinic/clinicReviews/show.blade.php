@extends('layouts.clinic')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.clinicReview.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('clinic.clinic-reviews.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.clinicReview.fields.id') }}
                        </th>
                        <td>
                            {{ $clinicReview->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clinicReview.fields.clinic') }}
                        </th>
                        <td>
                            {{ $clinicReview->clinic->clinic_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clinicReview.fields.user') }}
                        </th>
                        <td>
                            {{ $clinicReview->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clinicReview.fields.name') }}
                        </th>
                        <td>
                            {{ $clinicReview->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clinicReview.fields.rate') }}
                        </th>
                        <td>
                            {{ $clinicReview->rate }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clinicReview.fields.comment') }}
                        </th>
                        <td>
                            {{ $clinicReview->comment }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('clinic.clinic-reviews.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection