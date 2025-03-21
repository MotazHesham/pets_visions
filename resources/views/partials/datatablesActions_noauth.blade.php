@if($viewGate)
    <a class="btn btn-xs btn-primary" href="{{ route($crudRoutePart . '.show', $row->id) }}">
        {{ trans('global.view') }}
    </a> 
@endif
@if($editGate)
    <a class="btn btn-xs btn-info" href="{{ route($crudRoutePart . '.edit', $row->id) }}">
        {{ trans('global.edit') }}
    </a> 
@endif
@if($deleteGate)
    <form action="{{ route($crudRoutePart . '.destroy', $row->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
        <input type="hidden" name="_method" value="DELETE">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
    </form> 
@endif