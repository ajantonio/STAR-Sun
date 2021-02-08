<a href="{{route('permission.show', $permission)}}" class="btn btn-xs btn-outline-info"><i
        class="fas fa-eye"></i>
</a>

<a href="{{ route('permission.edit', $permission->id) }}" class="btn btn-xs btn-outline-primary">
    <i class="fa fa-pencil-alt"></i>
</a>

<button class="btn btn-xs btn-outline-danger"
        onclick="deletePermission('{{$permission->id}}', '{{$permission->name}}')"><i class="fa fa-trash"></i>
</button>
