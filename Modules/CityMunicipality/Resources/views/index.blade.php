@extends('citymunicipality::layouts.master')
@section('content_header')
    <h1><i class="fas fa-list"></i> {{plural(config('citymunicipality.name'))}}</h1>
@stop
@section('content')
    <div class="card card-outline card-primary">
        {!! $builder->table() !!}
    </div>
@endsection

@push('js')
    {!! $builder->scripts() !!}
    <script>
        applyHeaderSearch('citymunicipalitys');

        function deleteCityMucipality(id, citymunicipality) {
            swal({
                icon: "warning",
                title: "Delete",
                text: 'Delete city municipality' + citymunicipality + '?',
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if(willDelete){
                    axios.delete('/api/citymunicipality/' + id)
                        .then(res => {
                            swal('Success', 'City Municipality deleted!', 'success').then(val => {
                                window.LaravelDataTables["citymunicipalitys"].ajax.reload(null, false);
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
