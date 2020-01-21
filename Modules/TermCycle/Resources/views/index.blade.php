@extends('termcycle::layouts.master')
@section('content_header')
    <h1><i class="fas fa-list"></i> {{plural(config('termcycle.name'))}}</h1>
@stop
@section('content')
    <div class="card card-outline card-primary">
        {!! $builder->table() !!}
    </div>
@endsection

@push('js')
    {!! $builder->scripts() !!}
    <script>
        applyHeaderSearch('termcycles');

        function deleteTermCycle(id, name) {
            swal({
                icon: 'warning',
                title: 'Delete',
                text: 'Delete term cycle ' + name + '?',
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if(willDelete){
                    axios.delete('/api/termcycle/' + id)
                        .then(res => {
                            swal('Success', 'Term Cycle deleted!', 'success').then(val => {
                                window.LaravelDataTables["termcycles"].ajax.reload(null, false);
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


