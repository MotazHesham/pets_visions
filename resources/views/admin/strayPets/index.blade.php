@extends('layouts.admin')
@section('content')
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
            <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-StrayPet">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.strayPet.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.strayPet.fields.type') }}
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
            </table>
        </div>
    </div>
@endsection
@section('scripts')
    @parent
    <script>
        $(function() {
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
            @can('stray_pet_delete')
                let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
                let deleteButton = {
                    text: deleteButtonTrans,
                    url: "{{ route('admin.stray-pets.massDestroy') }}",
                    className: 'btn-danger',
                    action: function(e, dt, node, config) {
                        var ids = $.map(dt.rows({
                            selected: true
                        }).data(), function(entry) {
                            return entry.id
                        });

                        if (ids.length === 0) {
                            alert('{{ trans('global.datatables.zero_selected') }}')

                            return
                        }

                        if (confirm('{{ trans('global.areYouSure') }}')) {
                            $.ajax({
                                    headers: {
                                        'x-csrf-token': _token
                                    },
                                    method: 'POST',
                                    url: config.url,
                                    data: {
                                        ids: ids,
                                        _method: 'DELETE'
                                    }
                                })
                                .done(function() {
                                    location.reload()
                                })
                        }
                    }
                }
                dtButtons.push(deleteButton)
            @endcan

            let dtOverrideGlobals = {
                buttons: dtButtons,
                processing: true,
                serverSide: true,
                retrieve: true,
                aaSorting: [],
                ajax: "{{ route('admin.stray-pets.index') }}",
                columns: [{
                        data: 'placeholder',
                        name: 'placeholder'
                    },
                    {
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'type',
                        name: 'type'
                    },
                    {
                        data: 'first_name',
                        name: 'first_name'
                    },
                    {
                        data: 'last_name',
                        name: 'last_name'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'phone',
                        name: 'phone'
                    },
                    {
                        data: 'missing_place',
                        name: 'missing_place'
                    },
                    {
                        data: 'receiving_place',
                        name: 'receiving_place'
                    },
                    {
                        data: 'date',
                        name: 'date'
                    },
                    {
                        data: 'note',
                        name: 'note'
                    },
                    {
                        data: 'user_name',
                        name: 'user.name'
                    },
                    {
                        data: 'pet_type_name',
                        name: 'pet_type.name'
                    },
                    {
                        data: 'photo',
                        name: 'photo',
                        sortable: false,
                        searchable: false
                    },
                    {
                        data: 'affiliation_link',
                        name: 'affiliation_link'
                    },
                    {
                        data: 'actions',
                        name: '{{ trans('global.actions') }}'
                    }
                ],
                orderCellsTop: true,
                order: [
                    [1, 'desc']
                ],
                pageLength: 25,
            };
            let table = $('.datatable-StrayPet').DataTable(dtOverrideGlobals);
            $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });

        });
    </script>
@endsection
