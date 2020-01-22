@extends('gradelevel::layouts.master')
@section('content_header')
    <h1><i class="fas fa-list"></i> {{plural(config('gradelevel.name'))}}</h1>
@stop
@section('content')
    <el-row class="pb-2">
        <el-col :md="24">
            <el-card>
                <div slot="header"><i class="el-icon-edit text-primary"></i> Edit GradeLevel</div>
                <div>
                    @include('gradelevel::components.form')
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
                    form: {},
                    education_levels:[],
                    rules: {
                        name:[{required: true, message: 'This field is REQUIRED!!'}],
                        education_level_id:[{required:true, message:'This field is REQUIRED!!'}],
                    }
                }
            },
            mounted() {
                //execute scripts on page ready
                axios.get('{{route('api.gradelevel.find', $id)}}')
                    .then(res => {
                        this.form = res.data;
                    })
                    .catch(err => {
                        new ErrorHandler().handle(err.response);
                    });

                 axios.get('{{route('api.educationlevel.index')}}')
                    .then(res => {
                        this.education_levels = res.data;
                    })
                    .catch(err => {new ErrorHandler().handle(err.response)
                    });
            },
            computed: {},
            methods: {
                submitForm(formRefs) {
                    this.$refs[formRefs].validate((valid) => {
                        if (valid) {
                            axios.put('{{route('api.gradelevel.update', $id)}}', this.form)
                                .then(res => {
                                    swal('Success', 'Saved successfully!', 'success')
                                        .then(() => {
                                            window.location = '{{route('gradelevel.index')}}'
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
