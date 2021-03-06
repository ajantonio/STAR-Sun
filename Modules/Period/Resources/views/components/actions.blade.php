@can('edit-period')
    <a href="{{ route('period.edit', $period->id) }}" class="btn btn-xs btn-outline-primary">
        <i class="fa fa-pencil-alt"></i>
    </a>
@endcan()

@can('delete-period')
    <button class="btn btn-xs btn-outline-danger" onclick="deletePeriod('{{$period->id}}', '{{$period->name}}')"><i class="fa fa-trash"></i></button>
@endcan