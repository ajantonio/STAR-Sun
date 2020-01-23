@extends('termeventdetail::layouts.master')
@section('content_header')
    <h1><i class="fas fa-list"></i> {{plural(config('termeventdetail.name'))}}</h1>
@stop

@section('content')
    <el-row class="pb-2">
        <el-col :md="24">
            <el-card>
                <div slot="header"><i class="el-icon-plus text-primary"></i> Create Term Event Detail</div>
                <div>
                    @include('termeventdetail::components.form')
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
                        term_event_id: null,
                        datetime_start: null,
                        datetime_end: null
                    },
                    terms: [],
                    term_events: [],
                    rules:{
                        term_id: [{required: true, message: 'Please select Term'}],
                        term_event_id: [{required: true, message: 'Please select Term Event'}],
                        datetime_start: [{required: true, message: 'Please select Datetime Start'}],
                        datetime_end: [{required: true, message: 'Please select Datetime End'}]
                    }
                }
            },
            mounted() {
                //execute scripts on page ready
                axios.get('{{route('api.term.index')}}')
                    .then(res => {
                        this.terms = res.data;
                        console.log(res.data)
                    })
                    .catch(err => {new ErrorHandler().handle(err.response)
                    });

                axios.get('{{route('api.termevent.index')}}')
                    .then(res => {this.term_events = res.data;
                    })
                    .catch(err => {new ErrorHandler().handle(err.response)
                    });
            },
            computed:{
            },
            methods: {
                submitForm(formRefs){
                    this.$refs[formRefs].validate((valid) => {
                        if (valid) {
                            axios.post('{{route('api.termeventdetail.store')}}', this.form)
                                .then(res => {
                                    swal('Success', 'Saved successfully!', 'success')
                                        .then(() => {
                                            window.location = '{{route('termeventdetail.index')}}'
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
