@extends('educationlevel::layouts.master')
@section('content_header')
    <h1><i class="fas fa-list"></i> {{plural(config('educationlevel.name'))}}</h1>
@stop
@section('content')
    <div class="card card-outline card-primary">
        {!! $builder->table() !!}
    </div>
@endsection

@push('js')
    {!! $builder->scripts() !!}
    <script>
        applyHeaderSearch('educationlevels');

        function deleteEducationLevel(id, name) {
            swal({
                icon: 'warning',
                title: 'Delete',
                text: 'Delete educational level ' + name + '?',
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if(willDelete){
                    axios.delete('/api/educationlevel/' + id)
                        .then(res => {
                            swal('Success', 'Educationa level deleted!', 'success').then(val => {
                                window.LaravelDataTables["educationlevels"].ajax.reload(null, false);
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
