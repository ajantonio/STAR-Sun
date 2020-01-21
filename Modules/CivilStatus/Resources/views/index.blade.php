@extends('civilstatus::layouts.master')
@section('content_header')
    <h1><i class="fas fa-list"></i> {{plural(config('civilstatus.name'))}}</h1>
@stop
@section('content')
    <div class="card card-outline card-primary">
        {!! $builder->table() !!}
    </div>
@endsection

@push('js')
    {!! $builder->scripts() !!}
    <script>
        applyHeaderSearch('civilstatuss');

        function deleteCivilStatus(id, name) {
            swal({
                icon: 'warning',
                title: 'Delete',
                text: 'Delete civil status ' + name + '?',
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if(willDelete){
                    axios.delete('/api/civilstatus/' + id)
                        .then(res => {
                            swal('Success', 'Civil Status deleted!', 'success').then(val => {
                                window.LaravelDataTables["civilstatuss"].ajax.reload(null, false);
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

