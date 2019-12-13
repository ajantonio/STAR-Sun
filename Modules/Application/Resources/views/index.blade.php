@extends('application::layouts.master')
@section('content_header')
    <h1>Applications</h1>
@stop
@section('content')
    <div class="card card-outline card-primary">
        {!! $builder->table() !!}
    </div>
@endsection

@push('js')
    {!! $builder->scripts() !!}
    <script>
        applyHeaderSearch('applications');

        function deleteApplication(id) {
            axios.delete('/api/application/' + id)
                .then(res => {
                    console.log(res);
                    swal('Success', 'Application deleted!', 'success').then(val => {
                        window.LaravelDataTables["applications"].ajax.reload(null, false);
                    });
                })
                .catch(err => {
                    new ErrorHandler().handle(err.response);
                });
        }
    </script>
@endpush
