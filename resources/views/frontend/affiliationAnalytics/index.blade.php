@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.affiliationAnalytic.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-AffiliationAnalytic">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.affiliationAnalytic.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.affiliationAnalytic.fields.model_type') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.affiliationAnalytic.fields.model') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.affiliationAnalytic.fields.ip') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.affiliationAnalytic.fields.num_of_clicks') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.affiliationAnalytic.fields.user') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($affiliationAnalytics as $key => $affiliationAnalytic)
                                    <tr data-entry-id="{{ $affiliationAnalytic->id }}">
                                        <td>
                                            {{ $affiliationAnalytic->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\AffiliationAnalytic::MODEL_TYPE_SELECT[$affiliationAnalytic->model_type] ?? '' }}
                                        </td>
                                        <td>
                                            {{ $affiliationAnalytic->model ?? '' }}
                                        </td>
                                        <td>
                                            {{ $affiliationAnalytic->ip ?? '' }}
                                        </td>
                                        <td>
                                            {{ $affiliationAnalytic->num_of_clicks ?? '' }}
                                        </td>
                                        <td>
                                            {{ $affiliationAnalytic->user->name ?? '' }}
                                        </td>
                                        <td>
                                            @can('affiliation_analytic_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.affiliation-analytics.show', $affiliationAnalytic->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan


                                            @can('affiliation_analytic_delete')
                                                <form action="{{ route('frontend.affiliation-analytics.destroy', $affiliationAnalytic->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('affiliation_analytic_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.affiliation-analytics.massDestroy') }}",
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
  let table = $('.datatable-AffiliationAnalytic:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection