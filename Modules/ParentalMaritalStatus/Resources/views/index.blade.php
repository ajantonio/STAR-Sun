@extends('parentalmaritalstatus::layouts.master')

@section('content_header')
    <h1><i class="fas fa-list"></i> {{plural(config('parentalmaritalstatus.name'))}}</h1>
@stop

@section('content')
    <div class="card card-outline card-primary">
        {!! $builder->table() !!}
    </div>
@endsection

@push('js')
    {!! $builder->scripts() !!}
    <script>
        applyHeaderSearch('parentalmaritalstatuss');

        function deleteParentalMaritalStatus(id, name) {
            swal({
                icon: 'warning',
                title: 'Delete',
                text: 'Delete parental marital status ' + name + '?',
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if(willDelete){
                    axios.delete('/api/parentalmaritalstatus/' + id)
                        .then(res => {
                            swal('Success', 'Parental Marital Status deleted!', 'success').then(val => {
                                window.LaravelDataTables["parentalmaritalstatuss"].ajax.reload(null, false);
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
