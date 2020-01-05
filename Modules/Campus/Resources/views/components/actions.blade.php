@can('edit-campus')
    <a href="{{ route('campus.edit', $campus->id) }}" class="btn btn-xs btn-outline-primary">
        <i class="fa fa-pencil-alt"></i>
    </a>
@endcan()

@can('delete-campus')
    <button class="btn btn-xs btn-outline-danger" onclick="deleteCampus('{{$campus->id}}', '{{$campus->name}}')"><i class="fa fa-trash"></i></button>
@endcan