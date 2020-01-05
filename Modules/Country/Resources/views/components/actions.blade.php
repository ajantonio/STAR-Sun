@can('edit-country')
    <a href="{{ route('country.edit', $country->id) }}" class="btn btn-xs btn-outline-primary">
        <i class="fa fa-pencil-alt"></i>
    </a>
@endcan()

@can('delete-country')
    <button class="btn btn-xs btn-outline-danger" onclick="deleteCountry('{{$country->id}}', '{{$country->name}}')"><i class="fa fa-trash"></i></button>
@endcan