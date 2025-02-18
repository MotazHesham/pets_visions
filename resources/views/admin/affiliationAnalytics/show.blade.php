@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.affiliationAnalytic.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.affiliation-analytics.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.affiliationAnalytic.fields.id') }}
                        </th>
                        <td>
                            {{ $affiliationAnalytic->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.affiliationAnalytic.fields.model_type') }}
                        </th>
                        <td>
                            {{ App\Models\AffiliationAnalytic::MODEL_TYPE_SELECT[$affiliationAnalytic->model_type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.affiliationAnalytic.fields.model') }}
                        </th>
                        <td>
                            {{ $affiliationAnalytic->model }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.affiliationAnalytic.fields.ip') }}
                        </th>
                        <td>
                            {{ $affiliationAnalytic->ip }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.affiliationAnalytic.fields.num_of_clicks') }}
                        </th>
                        <td>
                            {{ $affiliationAnalytic->num_of_clicks }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.affiliationAnalytic.fields.user') }}
                        </th>
                        <td>
                            {{ $affiliationAnalytic->user->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.affiliation-analytics.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection