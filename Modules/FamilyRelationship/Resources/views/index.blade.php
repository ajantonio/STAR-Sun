@extends('familyrelationship::layouts.master')

@section('content_header')
    <h1><i class="fas fa-list"></i> {{plural(config('familyrelationship.name'))}}</h1>
@stop

@section('content')
    <div class="card card-outline card-primary">
        {!! $builder->table() !!}
    </div>
@endsection

@push('js')
    {!! $builder->scripts() !!}
    <script>
        applyHeaderSearch('familyrelationships');

        function deleteFamilyRelationship(id, name) {
            swal({
                icon: 'warning',
                title: 'Delete',
                text: 'Delete family relationship ' + name + '?',
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if(willDelete){
                    axios.delete('/api/familyrelationship/' + id)
                        .then(res => {
                            swal('Success', 'Family Relationship deleted!', 'success').then(val => {
                                window.LaravelDataTables["familyrelationships"].ajax.reload(null, false);
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
