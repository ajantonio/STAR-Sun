@extends('campus::layouts.master')

@section('content_header')
    <h1><i class="fas fa-school"></i> {{plural(config('campus.name'))}}</h1>
@stop

@section('content')
    <div class="card card-outline card-primary">
        {!! $builder->table() !!}
    </div>
@endsection

@push('js')
    {!! $builder->scripts() !!}
    <script>
        applyHeaderSearch('campuss');

        function deleteCampus(id, name) {
            swal({
                icon: 'warning',
                title: 'Delete',
                text: 'Delete campus ' + name + '?',
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if(willDelete){
                    axios.delete('/api/campus/' + id)
                        .then(res => {
                            swal('Success', 'Campus deleted!', 'success').then(val => {
                                window.LaravelDataTables["campuss"].ajax.reload(null, false);
                            });
                        })
                        .catch(err => {
                            new ErrorHandler().handle(err.response);
                        });
                }
            });
        }
    </script>
@endpush
