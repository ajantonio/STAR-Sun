@extends('termperiodevent::layouts.master')
@section('content_header')
    <h1><i class="fas fa-list"></i> {{plural(config('termperiodevent.name'))}}</h1>
@stop
@section('content')
    <div class="card card-outline card-primary">
        {!! $builder->table() !!}
    </div>
@endsection

@push('js')
    {!! $builder->scripts() !!}
    <script>
        applyHeaderSearch('termperiodevents');

        function deleteTermPeriodEvent(id, term_id) {
            swal({
                icon: 'warning',
                title: 'Delete',
                text: 'Delete this term period event?',
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if(willDelete){
                    axios.delete('/api/termperiodevent/' + id)
                        .then(res => {
                            swal('Success', 'Term Period Event deleted!', 'success').then(val => {
                                window.LaravelDataTables["termperiodevents"].ajax.reload(null, false);
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
