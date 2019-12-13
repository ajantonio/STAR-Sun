@can('edit-application')
    <a href="{{ route('application.edit', $application->id) }}" class="btn btn-xs btn-outline-primary">
        <i class="fa fa-pencil-alt"></i>
    </a>
@endcan()

@can('delete-application')
    <button class="btn btn-xs btn-outline-danger"><i class="fa fa-trash"></i></button>
@endcan