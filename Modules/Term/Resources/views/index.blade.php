@extends('term::layouts.master')
@section('content_header')
    <h1><i class="fas fa-list"></i> {{plural(config('term.name'))}}</h1>
@stop
@section('content')
    <div class="card card-outline card-primary">
        {!! $builder->table() !!}
    </div>
@endsection

@push('js')
    {!! $builder->scripts() !!}
    <script>
        applyHeaderSearch('terms');

        function deleteTerm(id, term) {
            swal({
                icon: 'warning',
                title: 'Delete',
                text: 'Delete term ' + term + '?',
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if(willDelete){
                    axios.delete('/api/term/' + id)
                        .then(res => {
                            swal('Success', 'Term deleted!', 'success').then(val => {
                                window.LaravelDataTables["terms"].ajax.reload(null, false);
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

