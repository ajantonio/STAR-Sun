@extends('dayofweek::layouts.master')
@section('content_header')
    <h1><i class="fas fa-list"></i> {{plural(config('dayofweek.name'))}}</h1>
@stop

@section('content')
    <el-row class="pb-2">
        <el-col :md="24">
            <el-card>
                <div slot="header"><i class="el-icon-edit text-primary"></i> Edit Day Of Week</div>
                <div>
                    @include('dayofweek::components.form')
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
                        day_string: null
                    },
                    rules: {
                        day_string: [{required: true, message: 'Please input the day of week.'}]
                    }
                }
            },
            mounted() {
                //execute scripts on page ready
                axios.get('{{route('api.dayofweek.find', $id)}}')
                    .then(res => {
                        this.form = res.data;
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
                            axios.put('{{route('api.dayofweek.update', $id)}}', this.form)
                                .then(res => {
                                    swal('Success', 'Saved successfully!', 'success')
                                        .then(() => {
                                            window.location = '{{route('dayofweek.index')}}'
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
