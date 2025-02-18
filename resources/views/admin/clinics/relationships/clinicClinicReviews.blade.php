@can('clinic_review_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.clinic-reviews.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.clinicReview.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.clinicReview.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-clinicClinicReviews">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.clinicReview.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.clinicReview.fields.clinic') }}
                        </th>
                        <th>
                            {{ trans('cruds.clinicReview.fields.user') }}
                        </th>
                        <th>
                            {{ trans('cruds.clinicReview.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.clinicReview.fields.rate') }}
                        </th>
                        <th>
                            {{ trans('cruds.clinicReview.fields.comment') }}
                        </th>
                        <th>
                            {{ trans('cruds.clinicReview.fields.created_at') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($clinicReviews as $key => $clinicReview)
                        <tr data-entry-id="{{ $clinicReview->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $clinicReview->id ?? '' }}
                            </td>
                            <td>
                                {{ $clinicReview->clinic->clinic_name ?? '' }}
                            </td>
                            <td>
                                {{ $clinicReview->user->name ?? '' }}
                            </td>
                            <td>
                                {{ $clinicReview->name ?? '' }}
                            </td>
                            <td>
                                {{ $clinicReview->rate ?? '' }}
                            </td>
                            <td>
                                {{ $clinicReview->comment ?? '' }}
                            </td>
                            <td>
                                {{ $clinicReview->created_at ?? '' }}
                            </td>
                            <td>
                                @can('clinic_review_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.clinic-reviews.show', $clinicReview->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('clinic_review_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.clinic-reviews.edit', $clinicReview->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('clinic_review_delete')
                                    <form action="{{ route('admin.clinic-reviews.destroy', $clinicReview->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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

@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('clinic_review_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.clinic-reviews.massDestroy') }}",
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
  let table = $('.datatable-clinicClinicReviews:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection