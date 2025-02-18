@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('adoption_request_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.adoption-requests.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.adoptionRequest.title_singular') }}
                        </a>
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.adoptionRequest.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-AdoptionRequest">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.adoptionRequest.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.adoptionRequest.fields.first_name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.adoptionRequest.fields.last_name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.adoptionRequest.fields.phone') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.adoptionRequest.fields.email') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.adoptionRequest.fields.gender') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.adoptionRequest.fields.age') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.adoptionRequest.fields.address') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($adoptionRequests as $key => $adoptionRequest)
                                    <tr data-entry-id="{{ $adoptionRequest->id }}">
                                        <td>
                                            {{ $adoptionRequest->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $adoptionRequest->first_name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $adoptionRequest->last_name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $adoptionRequest->phone ?? '' }}
                                        </td>
                                        <td>
                                            {{ $adoptionRequest->email ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\AdoptionRequest::GENDER_RADIO[$adoptionRequest->gender] ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\AdoptionRequest::AGE_SELECT[$adoptionRequest->age] ?? '' }}
                                        </td>
                                        <td>
                                            {{ $adoptionRequest->address ?? '' }}
                                        </td>
                                        <td>
                                            @can('adoption_request_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.adoption-requests.show', $adoptionRequest->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('adoption_request_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.adoption-requests.edit', $adoptionRequest->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('adoption_request_delete')
                                                <form action="{{ route('frontend.adoption-requests.destroy', $adoptionRequest->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                                </form>
                                            @endcan

                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('adoption_request_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.adoption-requests.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 25,
  });
  let table = $('.datatable-AdoptionRequest:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection