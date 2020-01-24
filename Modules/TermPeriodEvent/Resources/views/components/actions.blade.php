@can('edit-termperiodevent')
    <a href="{{ route('termperiodevent.edit', $termperiodevent->id) }}" class="btn btn-xs btn-outline-primary">
        <i class="fa fa-pencil-alt"></i>
    </a>
@endcan()

@can('delete-termperiodevent')
    <button class="btn btn-xs btn-outline-danger" onclick="deleteTermPeriodEvent('{{$termperiodevent->id}}', '{{$termperiodevent->term_id}}')"><i class="fa fa-trash"></i></button>
@endcan