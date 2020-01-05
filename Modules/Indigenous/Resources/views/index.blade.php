@extends('indigenous::layouts.master')
@section('content_header')
    <h1><i class="fas fa-list"></i> {{plural(config('indigenous.name'))}}</h1>
@stop
@section('content')
    <div class="card card-outline card-primary">
        {!! $builder->table() !!}
    </div>
@endsection

@push('js')
    {!! $builder->scripts() !!}
    <script>
        applyHeaderSearch('indigenouss');

        function deleteFamilyRelationship(id, name) {
            swal({
                icon: 'warning',
                title: 'Delete',
                text: 'Delete indigenous ' + name + '?',
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if(willDelete){
                    axios.delete('/api/indigenous/' + id)
                        .then(res => {
                            swal('Success', 'Indigenous deleted!', 'success').then(val => {
                                window.LaravelDataTables["indigenouss"].ajax.reload(null, false);
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
