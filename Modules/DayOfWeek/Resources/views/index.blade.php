@extends('dayofweek::layouts.master')
@section('content_header')
    <h1><i class="fas fa-list"></i> {{plural(config('dayofweek.name'))}}</h1>
@stop
@section('content')
    <div class="card card-outline card-primary">
        {!! $builder->table() !!}
    </div>
@endsection

@push('js')
    {!! $builder->scripts() !!}
    <script>
        applyHeaderSearch('dayofweeks');

        function deleteDayOfWeek(id, day_string) {
            swal({
                icon: 'warning',
                title: 'Delete',
                text: 'Delete day of week ' + day_string + '?',
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if(willDelete){
                    axios.delete('/api/dayofweek/' + id)
                        .then(res => {
                            swal('Success', 'Day of Week deleted!', 'success').then(val => {
                                window.LaravelDataTables["dayofweeks"].ajax.reload(null, false);
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

