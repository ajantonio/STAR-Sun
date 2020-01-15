@can('edit-addresstype')
    <a href="{{ route('addresstype.edit', $addresstype->id) }}" class="btn btn-xs btn-outline-primary">
        <i class="fa fa-pencil-alt"></i>
    </a>
@endcan()

@can('delete-addresstype')
    <button class="btn btn-xs btn-outline-danger" onclick="deleteAddressType('{{$addresstype->id}}', '{{$addresstype->name}}')"><i class="fa fa-trash"></i></button>
@endcan