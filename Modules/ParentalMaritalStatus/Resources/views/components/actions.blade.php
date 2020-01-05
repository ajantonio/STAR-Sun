@can('edit-parentalmaritalstatus')
    <a href="{{ route('parentalmaritalstatus.edit', $parentalmaritalstatus->id) }}" class="btn btn-xs btn-outline-primary">
        <i class="fa fa-pencil-alt"></i>
    </a>
@endcan()

@can('delete-parentalmaritalstatus')
    <button class="btn btn-xs btn-outline-danger" onclick="deleteParentalMaritalStatus('{{$parentalmaritalstatus->id}}', '{{$parentalmaritalstatus->name}}')"><i class="fa fa-trash"></i></button>
@endcan