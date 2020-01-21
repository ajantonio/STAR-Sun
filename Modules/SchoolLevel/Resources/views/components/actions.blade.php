@can('edit-schoollevel')
    <a href="{{ route('schoollevel.edit', $schoollevel->id) }}" class="btn btn-xs btn-outline-primary">
        <i class="fa fa-pencil-alt"></i>
    </a>
@endcan()

@can('delete-schoollevel')
<button class="btn btn-xs btn-outline-danger" onclick="deleteSchoolLevel('{{$schoollevel->id}}', '{{$schoollevel->name}}')"><i class="fa fa-trash"></i></button>
@endcan