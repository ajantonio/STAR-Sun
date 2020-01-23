@extends('termeventdetail::layouts.master')
@section('content_header')
    <h1><i class="fas fa-list"></i> {{plural(config('termeventdetail.name'))}}</h1>
@stop
@section('content')
    <div class="card card-outline card-primary">
        {!! $builder->table() !!}
    </div>
@endsection

@push('js')
    {!! $builder->scripts() !!}
    <script>
        applyHeaderSearch('termeventdetails');

        function deleteTermEventDetail(id, term_id) {
            swal({
                icon: 'warning',
                title: 'Delete',
                text: 'Delete this term event term details?',
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if(willDelete){
                    axios.delete('/api/termeventdetail/' + id)
                        .then(res => {
                            swal('Success', 'Term deleted!', 'success').then(val => {
                                window.LaravelDataTables["termeventdetails"].ajax.reload(null, false);
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