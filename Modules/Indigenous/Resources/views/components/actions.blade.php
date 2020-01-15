@can('edit-indigenous')
    <a href="{{ route('indigenous.edit', $indigenous->id) }}" class="btn btn-xs btn-outline-primary">
        <i class="fa fa-pencil-alt"></i>
    </a>
@endcan()

@can('delete-indigenous')
    <button class="btn btn-xs btn-outline-danger" onclick="deleteIndigenous('{{$indigenous->id}}', '{{$indigenous->name}}')"><i class="fa fa-trash"></i></button>
@endcan