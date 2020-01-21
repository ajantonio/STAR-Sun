@can('edit-termevent')
    <a href="{{ route('termevent.edit', $termevent->id) }}" class="btn btn-xs btn-outline-primary">
        <i class="fa fa-pencil-alt"></i>
    </a>
@endcan()

@can('delete-termevent')
    <button class="btn btn-xs btn-outline-danger" onclick="deleteTermEvent('{{$termevent->id}}', '{{$termevent->name}}')"><i class="fa fa-trash"></i></button>
@endcan