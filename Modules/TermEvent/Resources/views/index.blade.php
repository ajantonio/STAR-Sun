@extends('termevent::layouts.master')
@section('content_header')
    <h1><i class="fas fa-list"></i> {{plural(config('termevent.name'))}}</h1>
@stop
@section('content')
    <div class="card card-outline card-primary">
        {!! $builder->table() !!}
    </div>
@endsection

@push('js')
    {!! $builder->scripts() !!}
    <script>
        applyHeaderSearch('termevents');

        function deleteTermEvent(id, name) {
            swal({
                icon: 'warning',
                title: 'Delete',
                text: 'Delete term event ' + name + '?',
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if(willDelete){
                    axios.delete('/api/termevent/' + id)
                        .then(res => {
                            swal('Success', 'Term Event deleted!', 'success').then(val => {
                                window.LaravelDataTables["termevents"].ajax.reload(null, false);
                            });
                        })
                        .catch(err => {
                            new ErrorHandler().handle(err.response);
                        });
                }
            });
        }
    </script>
    </script>
@endpush
