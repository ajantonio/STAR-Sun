@can('edit-familyrelationship')
    <a href="{{ route('familyrelationship.edit', $familyrelationship->id) }}" class="btn btn-xs btn-outline-primary">
        <i class="fa fa-pencil-alt"></i>
    </a>
@endcan()

@can('delete-familyrelationship')
    <button class="btn btn-xs btn-outline-danger" onclick="deleteFamilyRelationship('{{$familyrelationship->id}}', '{{$familyrelationship->name}}')"><i class="fa fa-trash"></i></button>
@endcan