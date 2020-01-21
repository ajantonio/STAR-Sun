@extends('term::layouts.master')
@section('content_header')
    <h1><i class="fas fa-list"></i> {{plural(config('term.name'))}}</h1>
@stop

@section('content')
    <el-row class="pb-2">
        <el-col :md="24">
            <el-card>
                <div slot="header"><i class="el-icon-edit text-primary"></i> Edit Term</div>
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
                    campuses: null,
                    term_cycles: null,
                    rules: {
                        campus_id: [{required: true, message: 'Please select Campus.'}],
                        term_cycle_id: [{required: true, message: 'Please select Term Cycle.'}]
                    }
                }
            },
            mounted() {
                //execute scripts on page ready
                axios.get('{{route('api.term.find', $id)}}')
                    .then(res => {
                        this.form = res.data;
                        console.log(res.data);
                    })
                    .catch(err => {
                        new ErrorHandler().handle(err.response);
                    });

                axios.get('{{route('api.campus.index')}}')
                    .then(res => {
                        this.campuses = res.data;
                        // console.log(res.data);
                    })
                    .catch(err => {
                        new ErrorHandler().handle(err.response);
                    });

                axios.get('{{route('api.termcycle.index')}}')
                    .then(res => {
                        this.term_cycles = res.data;
                        // console.log(res.data);
                    })
                    .catch(err => {
                        new ErrorHandler().handle(err.response);
                    });
            },
            computed: {},
            methods: {
                submitForm(formRefs) {
                    this.$refs[formRefs].validate((valid) => {
                        if (valid) {
                            axios.put('{{route('api.term.update', $id)}}', this.form)
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
