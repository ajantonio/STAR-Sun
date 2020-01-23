@extends('gradelevel::layouts.master')
@section('content_header')
    <h1><i class="fas fa-list"></i> {{plural(config('gradelevel.name'))}}</h1>
@stop
@section('content')
    <div class="card card-outline card-primary">
        {!! $builder->table() !!}
    </div>
@endsection

@push('js')
    {!! $builder->scripts() !!}
    <script>
        applyHeaderSearch('gradelevels');
        function deleteGradeLevel(id, name) {
            swal({
                icon: 'warning',
                title: 'Delete',
                text: 'Delete grade level ' + name + '?',
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if(willDelete){
                    axios.delete('/api/gradelevel/' + id)
                        .then(res => {
                            swal('Success', 'Grade Level deleted!', 'success').then(val => {
                                window.LaravelDataTables["gradelevels"].ajax.reload(null, false);
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
