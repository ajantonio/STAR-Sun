@can('edit-term')
    <a href="{{ route('term.edit', $term->id) }}" class="btn btn-xs btn-outline-primary">
        <i class="fa fa-pencil-alt"></i>
    </a>
@endcan()

@can('delete-term')
    <button class="btn btn-xs btn-outline-danger"><i class="fa fa-trash"></i></button>
@endcan