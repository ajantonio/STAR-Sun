@extends('country::layouts.master')

@section('content_header')
    <h1><i class="fas fa-list"></i> {{plural(config('country.name'))}}</h1>
@stop

@section('content')
    <div class="card card-outline card-primary">
        {!! $builder->table() !!}
    </div>
@endsection

@push('js')
    {!! $builder->scripts() !!}
    <script>
        applyHeaderSearch('countrys');

        function deleteCountry(id, name) {
            swal({
                icon: 'warning',
                title: 'Delete',
                text: 'Delete country ' + name + '?',
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if(willDelete){
                    axios.delete('/api/country/' + id)
                        .then(res => {
                            swal('Success', 'Country deleted!', 'success').then(val => {
                                window.LaravelDataTables["countrys"].ajax.reload(null, false);
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
