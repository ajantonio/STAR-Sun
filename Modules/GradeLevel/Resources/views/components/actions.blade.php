@can('edit-gradelevel')
    <a href="{{ route('gradelevel.edit', $gradelevel->id) }}" class="btn btn-xs btn-outline-primary">
        <i class="fa fa-pencil-alt"></i>
    </a>
@endcan()

@can('delete-gradelevel')
<button class="btn btn-xs btn-outline-danger" onclick="deleteGradeLevel('{{$gradelevel->id}}', '{{$gradelevel->name}}')"><i class="fa fa-trash"></i></button>
@endcan