@extends('schoollevel::layouts.master')
@section('content_header')
    <h1><i class="fas fa-list"></i> {{plural(config('schoollevel.name'))}}</h1>
@stop
@section('content')
    <div class="card card-outline card-primary">
        {!! $builder->table() !!}
    </div>
@endsection

@push('js')
    {!! $builder->scripts() !!}
    <script>
        applyHeaderSearch('schoollevels');
        function deleteSchoolLevel(id, name) {
            swal({
                icon: 'warning',
                title: 'Delete',
                text: 'Delete school level ' + name + '?',
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if(willDelete){
                    axios.delete('/api/schoollevel/' + id)
                        .then(res => {
                            swal('Success', 'School Level deleted!', 'success').then(val => {
                                window.LaravelDataTables["schoollevels"].ajax.reload(null, false);
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
