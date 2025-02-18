@can('adoption_pet_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.adoption-pets.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.adoptionPet.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.adoptionPet.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-userAdoptionPets">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.adoptionPet.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.adoptionPet.fields.user') }}
                        </th>
                        <th>
                            {{ trans('cruds.adoptionPet.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.adoptionPet.fields.pet_type') }}
                        </th>
                        <th>
                            {{ trans('cruds.adoptionPet.fields.fasila') }}
                        </th>
                        <th>
                            {{ trans('cruds.adoptionPet.fields.age') }}
                        </th>
                        <th>
                            {{ trans('cruds.adoptionPet.fields.photo') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($adoptionPets as $key => $adoptionPet)
                        <tr data-entry-id="{{ $adoptionPet->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $adoptionPet->id ?? '' }}
                            </td>
                            <td>
                                {{ $adoptionPet->user->name ?? '' }}
                            </td>
                            <td>
                                {{ $adoptionPet->name ?? '' }}
                            </td>
                            <td>
                                {{ $adoptionPet->pet_type->name ?? '' }}
                            </td>
                            <td>
                                {{ $adoptionPet->fasila ?? '' }}
                            </td>
                            <td>
                                {{ $adoptionPet->age ?? '' }}
                            </td>
                            <td>
                                @if($adoptionPet->photo)
                                    <a href="{{ $adoptionPet->photo->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $adoptionPet->photo->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                            <td>
                                @can('adoption_pet_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.adoption-pets.show', $adoptionPet->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('adoption_pet_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.adoption-pets.edit', $adoptionPet->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('adoption_pet_delete')
                                    <form action="{{ route('admin.adoption-pets.destroy', $adoptionPet->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('adoption_pet_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.adoption-pets.massDestroy') }}",
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
  let table = $('.datatable-userAdoptionPets:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection