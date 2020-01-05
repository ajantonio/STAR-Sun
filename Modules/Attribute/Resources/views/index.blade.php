@extends('attribute::layouts.master')

@section('content_header')
    <h1><i class="fas fa-list"></i> {{plural(config('attribute.name'))}}</h1>
@stop

@section('content')
    <div class="card card-outline card-primary">
        {!! $builder->table() !!}
    </div>
@endsection

@push('js')
    {!! $builder->scripts() !!}
    <script>
        applyHeaderSearch('attributes');

        function deleteAttribute(id, name) {
            swal({
                icon: 'warning',
                title: 'Delete',
                text: 'Delete attribute ' + name + '?',
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if(willDelete){
                    axios.delete('/api/attribute/' + id)
                        .then(res => {
                            swal('Success', 'Attribute deleted!', 'success').then(val => {
                                window.LaravelDataTables["attributes"].ajax.reload(null, false);
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
