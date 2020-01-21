@extends('period::layouts.master')
@section('content_header')
    <h1><i class="fas fa-list"></i> {{plural(config('period.name'))}}</h1>
@stop
@section('content')
    <div class="card card-outline card-primary">
        {!! $builder->table() !!}
    </div>
@endsection

@push('js')
    {!! $builder->scripts() !!}
    <script>
        applyHeaderSearch('periods');

        function deletePeriod(id, name) {
            swal({
                icon: 'warning',
                title: 'Delete',
                text: 'Delete period ' + name + '?',
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if(willDelete){
                    axios.delete('/api/period/' + id)
                        .then(res => {
                            swal('Success', 'Period deleted!', 'success').then(val => {
                                window.LaravelDataTables["periods"].ajax.reload(null, false);
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

