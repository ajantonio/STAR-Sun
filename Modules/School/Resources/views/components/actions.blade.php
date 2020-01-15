@can('edit-school')
    <a href="{{ route('school.edit', $school->id) }}" class="btn btn-xs btn-outline-primary">
        <i class="fa fa-pencil-alt"></i>
    </a>
@endcan()

@can('delete-school')
<button class="btn btn-xs btn-outline-danger" onclick="deleteSchool('{{$school->id}}', '{{$school->name}}')"><i class="fa fa-trash"></i></button>
@endcan