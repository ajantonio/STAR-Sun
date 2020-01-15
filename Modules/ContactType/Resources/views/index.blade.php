@extends('contacttype::layouts.master')
@section('content_header')
    <h1><i class="fas fa-list"></i> {{plural(config('contacttype.name'))}}</h1>
@stop
@section('content')
    <div class="card card-outline card-primary">
        {!! $builder->table() !!}
    </div>
@endsection

@push('js')
    {!! $builder->scripts() !!}
    <script>
        applyHeaderSearch('contacttypes');
        function deleteContactType(id, name) {
            swal({
                icon: 'warning',
                title: 'Delete',
                text: 'Delete Contact type ' + name + '?',
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if(willDelete){
                    axios.delete('/api/contacttype/' + id)
                        .then(res => {
                            swal('Success', 'Contact Type deleted!', 'success').then(val => {
                                window.LaravelDataTables["contacttypes"].ajax.reload(null, false);
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
