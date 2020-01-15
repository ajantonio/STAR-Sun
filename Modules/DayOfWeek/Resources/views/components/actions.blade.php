@can('edit-dayofweek')
    <a href="{{ route('dayofweek.edit', $dayofweek->id) }}" class="btn btn-xs btn-outline-primary">
        <i class="fa fa-pencil-alt"></i>
    </a>
@endcan()

@can('delete-dayofweek')
    <button class="btn btn-xs btn-outline-danger" onclick="deleteDayOfWeek('{{$dayofweek->id}}', '{{$dayofweek->day_string}}')"><i class="fa fa-trash"></i></button>
@endcan