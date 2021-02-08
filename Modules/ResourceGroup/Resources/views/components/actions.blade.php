<a href="{{ route('resourcegroup.edit', $resourcegroup->id) }}" class="btn btn-xs btn-outline-primary">
    <i class="fa fa-pencil-alt"></i>
</a>


<button class="btn btn-xs btn-outline-danger" onclick="deleteGroup('{{$resourcegroup->id}}', '{{$resourcegroup->name}}')"><i class="fa fa-trash"></i></button>
