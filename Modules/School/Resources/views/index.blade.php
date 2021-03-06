@extends('school::layouts.master')
@section('content_header')
    <h1><i class="fas fa-list"></i> {{plural(config('school.name'))}}</h1>
@stop
@section('content')
    <div class="card card-outline card-primary">
        {!! $builder->table() !!}
    </div>
@endsection

@push('js')
    {!! $builder->scripts() !!}
    <script>
        applyHeaderSearch('schools');
        function deleteSchool(id, name) {
            swal({
                icon: 'warning',
                title: 'Delete',
                text: 'Delete school ' + name + '?',
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if(willDelete){
                    axios.delete('/api/school/' + id)
                        .then(res => {
                            swal('Success', 'School deleted!', 'success').then(val => {
                                window.LaravelDataTables["schools"].ajax.reload(null, false);
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
