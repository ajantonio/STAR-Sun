@can('edit-civilstatus')
    <a href="{{ route('civilstatus.edit', $civilstatus->id) }}" class="btn btn-xs btn-outline-primary">
        <i class="fa fa-pencil-alt"></i>
    </a>
@endcan()

@can('delete-civilstatus')
    <button class="btn btn-xs btn-outline-danger" onclick="deleteCivilStatus('{{$civilstatus->id}}', '{{$civilstatus->name}}')"><i class="fa fa-trash"></i></button>
@endcan