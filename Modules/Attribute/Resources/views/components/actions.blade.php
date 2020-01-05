@can('edit-attribute')
    <a href="{{ route('attribute.edit', $attribute->id) }}" class="btn btn-xs btn-outline-primary">
        <i class="fa fa-pencil-alt"></i>
    </a>
@endcan()

@can('delete-attribute')
    <button class="btn btn-xs btn-outline-danger" onclick="deleteAttribute('{{$attribute->id}}', '{{$attribute->name}}')"><i class="fa fa-trash"></i></button>
@endcan