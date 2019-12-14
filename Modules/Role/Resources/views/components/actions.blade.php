@can('edit-role')
    <a href="{{ route('role.edit', $role->id) }}" class="btn btn-xs btn-outline-primary">
        <i class="fa fa-pencil-alt"></i>
    </a>
@endcan()

@can('delete-role')
    <button class="btn btn-xs btn-outline-danger"><i class="fa fa-trash"></i></button>
@endcan