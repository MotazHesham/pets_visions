@can('stray_pet_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.stray-pets.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.strayPet.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.strayPet.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-petTypeStrayPets">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.strayPet.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.strayPet.fields.first_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.strayPet.fields.last_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.strayPet.fields.email') }}
                        </th>
                        <th>
                            {{ trans('cruds.strayPet.fields.phone') }}
                        </th>
                        <th>
                            {{ trans('cruds.strayPet.fields.missing_place') }}
                        </th>
                        <th>
                            {{ trans('cruds.strayPet.fields.receiving_place') }}
                        </th>
                        <th>
                            {{ trans('cruds.strayPet.fields.date') }}
                        </th>
                        <th>
                            {{ trans('cruds.strayPet.fields.note') }}
                        </th>
                        <th>
                            {{ trans('cruds.strayPet.fields.user') }}
                        </th>
                        <th>
                            {{ trans('cruds.strayPet.fields.pet_type') }}
                        </th>
                        <th>
                            {{ trans('cruds.strayPet.fields.photo') }}
                        </th>
                        <th>
                            {{ trans('cruds.strayPet.fields.affiliation_link') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($strayPets as $key => $strayPet)
                        <tr data-entry-id="{{ $strayPet->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $strayPet->id ?? '' }}
                            </td>
                            <td>
                                {{ $strayPet->first_name ?? '' }}
                            </td>
                            <td>
                                {{ $strayPet->last_name ?? '' }}
                            </td>
                            <td>
                                {{ $strayPet->email ?? '' }}
                            </td>
                            <td>
                                {{ $strayPet->phone ?? '' }}
                            </td>
                            <td>
                                {{ $strayPet->missing_place ?? '' }}
                            </td>
                            <td>
                                {{ $strayPet->receiving_place ?? '' }}
                            </td>
                            <td>
                                {{ $strayPet->date ?? '' }}
                            </td>
                            <td>
                                {{ $strayPet->note ?? '' }}
                            </td>
                            <td>
                                {{ $strayPet->user->name ?? '' }}
                            </td>
                            <td>
                                {{ $strayPet->pet_type->name ?? '' }}
                            </td>
                            <td>
                                @if($strayPet->photo)
                                    <a href="{{ $strayPet->photo->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $strayPet->photo->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                            <td>
                                {{ $strayPet->affiliation_link ?? '' }}
                            </td>
                            <td>
                                @can('stray_pet_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.stray-pets.show', $strayPet->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('stray_pet_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.stray-pets.edit', $strayPet->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('stray_pet_delete')
                                    <form action="{{ route('admin.stray-pets.destroy', $strayPet->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('stray_pet_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.stray-pets.massDestroy') }}",
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
  let table = $('.datatable-petTypeStrayPets:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection