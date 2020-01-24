@extends('termperiodevent::layouts.master')
@section('content_header')
    <h1><i class="fas fa-list"></i> {{plural(config('termperiodevent.name'))}}</h1>
@stop

@section('content')
    <el-row class="pb-2">
        <el-col :md="24">
            <el-card>
                <div slot="header"><i class="el-icon-edit text-primary"></i> Edit Term Period Event</div>
                <div>
                    @include('termperiodevent::components.form')
                </div>
            </el-card>
        </el-col>
    </el-row>
@stop

@section('js')
    <script>
        new Vue({
            el: '.content',
            data() {
                return {
                    form: {
                        term_id: null,
                        period_id: null,
                        term_event_id: null,
                        datetime_start: null,
                        datetime_end: null
                    },
                    terms: [],
                    periods: [],
                    term_events: [],
                    rules: {
                        term_id: [{required: true, message: 'Please select Term.'}],
                        period_id: [{required: true, message: 'Please select Period.'}],
                        term_event_id: [{required: true, message: 'Please select Term Event.'}],
                        datetime_start: [{required: true, message: 'Please select Date Time Start.'}],
                        datetime_end: [{required: true, message: 'Please select Date Time End.'}]
                    }
                }
            },
            mounted() {
                //execute scripts on page ready
                axios.get('{{route('api.termperiodevent.find', ['termperiodevent'=>$id, 'with'=>'term_event'])}}')
                    .then(res => {
                        this.form = res.data;
                    })
                    .catch(err => {
                        new ErrorHandler().handle(err.response);
                    });
                //routing to term data
                axios.get('{{route('api.term.index')}}')
                    .then(res =>{
                        this.terms = res.data;
                    })
                    .catch(err => {
                        new ErrorHandler().handle(err.response)
                    });
                //routing to period data
                axios.get('{{route('api.period.index')}}')
                    .then(res => {
                        this.periods = res.data;
                    })
                    .catch(err => {
                        new ErrorHandler().handle(err.response)
                    });
                //routing to term_event data
                axios.get('{{route('api.termevent.index')}}')
                    .then(res =>{
                        this.term_events = res.data;
                    })
                    .catch(err =>{
                        new ErrorHandler().handle(err.response)
                    });
            },
            computed: {},
            methods: {
                submitForm(formRefs) {
                    this.$refs[formRefs].validate((valid) => {
                        if (valid) {
                            axios.put('{{route('api.termperiodevent.update', $id)}}', this.form)
                                .then(res => {
                                    swal('Success', 'Saved successfully!', 'success')
                                        .then(() => {
                                            window.location = '{{route('termperiodevent.index')}}'
                                        });
                                })
                                .catch(err => {
                                    new ErrorHandler().handle(err.response);
                                });
                        } else {
                            ElementUI.Notification.error('Please input required fields.');
                            return false;
                        }
                    });
                }
            }
        });
    </script>
@stop
