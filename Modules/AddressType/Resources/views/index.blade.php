@extends('addresstype::layouts.master')
@section('content_header')
    <h1><i class="fas fa-list"></i> {{plural(config('addresstype.name'))}}</h1>
@stop
@section('content')
    <div class="card card-outline card-primary">
        {!! $builder->table() !!}
    </div>
@endsection

@push('js')
    {!! $builder->scripts() !!}
    <script>
        applyHeaderSearch('addresstypes');

            function deleteAddressType(id, name) {
                swal({
                    icon: 'warning',
                    title: 'Delete',
                    text: 'Delete address type ' + name + '?',
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {
                    if(willDelete){
                        axios.delete('/api/addresstype/' + id)
                            .then(res => {
                                swal('Success', 'Address Type deleted!', 'success').then(val => {
                                    window.LaravelDataTables["addresstypes"].ajax.reload(null, false);
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
