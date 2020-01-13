@can('edit-contacttype')
    <a href="{{ route('contacttype.edit', $contacttype->id) }}" class="btn btn-xs btn-outline-primary">
        <i class="fa fa-pencil-alt"></i>
    </a>
@endcan()

@can('delete-contacttype')
    <button class="btn btn-xs btn-outline-danger" onclick="deleteContactType('{{$contacttype->id}}','{{$contacttype->name}}')"><i class="fa fa-trash"></i></button>
@endcan