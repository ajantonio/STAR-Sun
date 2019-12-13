@can('edit-application')
    <a href="{{ route('application.edit', $application->id) }}" class="btn btn-xs btn-outline-primary">
        <i class="fa fa-pencil-alt"></i>
    </a>
@endcan()

@can('delete-application')
    <button  class="btn btn-xs btn-outline-danger" onclick="deleteApplication('{{$application->id}}')"><i class="fa fa-trash"></i> del api</button>
    <button data-toggle="modal" data-target="#modal-delete-application{{$application->id}}" class="btn btn-xs btn-outline-danger" onclick="deleteApplication('{{$application->id}}')"><i class="fa fa-trash"></i></button>

    <!-- Modal -->
    <div class="modal" id="modal-delete-application{{$application->id}}" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content text-left">
                <form action="{{route('application.delete', $application)}}" method="post">
                    @csrf
                    @method('delete')

                    <div class="modal-header">
                        <h5 class="modal-title">Delete Application</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Delete application "{{ $application->name }}"?
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger mr-1">Delete</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endcan