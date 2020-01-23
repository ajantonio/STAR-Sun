@can('edit-termeventdetail')
    <a href="{{ route('termeventdetail.edit', $termeventdetail->id) }}" class="btn btn-xs btn-outline-primary">
        <i class="fa fa-pencil-alt"></i>
    </a>
@endcan()

@can('delete-termeventdetail')
    <button class="btn btn-xs btn-outline-danger" onclick="deleteTermEventDetail('{{$termeventdetail->id}}', '{{$termeventdetail->term_id}}')"><i class="fa fa-trash"></i></button>
@endcan