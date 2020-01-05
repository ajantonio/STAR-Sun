@extends('religion::layouts.master')

@section('content_header')
    <h1><i class="fas fa-list"></i> {{plural(config('religion.name'))}}</h1>
@stop

@section('content')
    <div class="card card-outline card-primary">
        {!! $builder->table() !!}
    </div>
@endsection

@push('js')
    {!! $builder->scripts() !!}
    <script>
        applyHeaderSearch('religions');

        function deleteReligion(id, name) {
            swal({
                icon: 'warning',
                title: 'Delete',
                text: 'Delete religion ' + name + '?',
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if(willDelete){
                    axios.delete('/api/religion/' + id)
                        .then(res => {
                            swal('Success', 'Religion deleted!', 'success').then(val => {
                                window.LaravelDataTables["religions"].ajax.reload(null, false);
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
