@extends('term::layouts.master')
@section('content_header')
    <h1><i class="fas fa-list"></i> {{plural(config('term.name'))}}</h1>
@stop

@section('content')
    <el-row class="pb-2">
        <el-col :md="24">
            <el-card>
                <div slot="header"><i class="el-icon-plus text-primary"></i> Create Term</div>
                <div>
                    @include('term::components.form')
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
                        campus_id: null,
                        term_cycle_id: null,
                        school_year: null,
                        term: null,
                        is_ongoing: null
                    },
                    campuss: [],
                    term_cycles: [],
                    rules:{
                        campus_id: [{required: true, message: 'Please select Campus.'}],
                        term_cycle_id: [{required: true, message: 'Please select Term Cycle.'}],
                        school_year: [{required: true, message: 'Please enter School Year.'}],
                        term: [{required: true, message: 'Please enter Term.'}],
                        is_ongoing: [{required: true, message: 'Please state if Yes or No.'}]
                    }
                }
            },
            mounted() {
                //execute scripts on page ready
                axios.get('{{route('api.campus.index')}}')
                    .then(res => {this.campuss = res.data;
                    })
                    .catch(err => {new ErrorHandler().handle(err.response)}
                    );

                axios.get('{{route('api.termcycle.index')}}')
                    .then(res => {this.termcycles = res.data;
                    })
                    .catch(err => {new ErrorHandler().handle(err.response)}
                    );
            },
            computed:{
            },
            methods: {
                submitForm(formRefs){
                    this.$refs[formRefs].validate((valid) => {
                        if (valid) {
                            axios.post('{{route('api.term.store')}}', this.form)
                                .then(res => {
                                    swal('Success', 'Saved successfully!', 'success')
                                        .then(() => {
                                            window.location = '{{route('term.index')}}'
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
