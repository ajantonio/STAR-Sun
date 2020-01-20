@can('edit-termcycle')
    <a href="{{ route('termcycle.edit', $termcycle->id) }}" class="btn btn-xs btn-outline-primary">
        <i class="fa fa-pencil-alt"></i>
    </a>
@endcan()

@can('delete-termcycle')
    <button class="btn btn-xs btn-outline-danger" onclick="deleteTermCycle('{{$termcycle->id}}', '{{$termcycle->name}}')"><i class="fa fa-trash"></i></button>
@endcan