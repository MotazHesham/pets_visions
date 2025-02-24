@extends('layouts.hosting')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.hostingReview.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('hosting.hosting-reviews.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.hostingReview.fields.id') }}
                        </th>
                        <td>
                            {{ $hostingReview->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hostingReview.fields.hosting') }}
                        </th>
                        <td>
                            {{ $hostingReview->hosting->hosting_phone ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hostingReview.fields.user') }}
                        </th>
                        <td>
                            {{ $hostingReview->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hostingReview.fields.name') }}
                        </th>
                        <td>
                            {{ $hostingReview->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hostingReview.fields.rate') }}
                        </th>
                        <td>
                            {{ $hostingReview->rate }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hostingReview.fields.comment') }}
                        </th>
                        <td>
                            {{ $hostingReview->comment }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('hosting.hosting-reviews.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection