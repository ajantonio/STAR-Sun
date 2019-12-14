@can('edit-permission')
    <a href="{{ route('permission.edit', $permission->id) }}" class="btn btn-xs btn-outline-primary">
        <i class="fa fa-pencil-alt"></i>
    </a>
@endcan()

@can('delete-permission')
    <button class="btn btn-xs btn-outline-danger"><i class="fa fa-trash"></i></button>
@endcan