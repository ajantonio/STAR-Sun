@can('edit-religion')
    <a href="{{ route('religion.edit', $religion->id) }}" class="btn btn-xs btn-outline-primary">
        <i class="fa fa-pencil-alt"></i>
    </a>
@endcan()

@can('delete-religion')
    <button class="btn btn-xs btn-outline-danger" onclick="deleteReligion('{{$religion->id}}', '{{$religion->name}}')"><i class="fa fa-trash"></i></button>
@endcan