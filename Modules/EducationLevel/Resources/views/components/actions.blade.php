@can('edit-educationlevel')
    <a href="{{ route('educationlevel.edit', $educationlevel->id) }}" class="btn btn-xs btn-outline-primary">
        <i class="fa fa-pencil-alt"></i>
    </a>
@endcan()

@can('delete-educationlevel')
<button class="btn btn-xs btn-outline-danger" onclick="deleteEducationLevel('{{$educationlevel->id}}', '{{$educationlevel->name}}')"><i class="fa fa-trash"></i></button>
@endcan