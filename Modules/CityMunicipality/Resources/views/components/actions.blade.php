@can('edit-citymunicipality')
    <a href="{{ route('citymunicipality.edit', $citymunicipality->id) }}" class="btn btn-xs btn-outline-primary">
        <i class="fa fa-pencil-alt"></i>
    </a>
@endcan()

@can('delete-citymunicipality')
    <button class="btn btn-xs btn-outline-danger" onclick="deleteCityMucipality('{{$citymunicipality->id}}','{{$citymunicipality->citymunicipality}}')"><i class="fa fa-trash"></i></button>
@endcan