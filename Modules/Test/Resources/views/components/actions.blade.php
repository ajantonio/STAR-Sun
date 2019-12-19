@can('edit-test')
    <a href="{{ route('test.edit', $test->id) }}" class="btn btn-xs btn-outline-primary">
        <i class="fa fa-pencil-alt"></i>
    </a>
@endcan()

@can('delete-test')
    <button class="btn btn-xs btn-outline-danger"><i class="fa fa-trash"></i></button>
@endcan