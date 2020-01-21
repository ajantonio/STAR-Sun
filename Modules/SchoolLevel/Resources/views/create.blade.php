@extends('schoollevel::layouts.master')
@section('content_header')
    <h1><i class="fas fa-list"></i> {{plural(config('schoollevel.name'))}}</h1>
@stop
@section('content')
    <el-row class="pb-2">
        <el-col :md="24">
            <el-card>
                <div slot="header"><i class="el-icon-plus text-primary"></i> Create SchoolLevel</div>
                <div>
                   @include('schoollevel::components.form')
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
                        name: null,
                        education_level_id: null,
                        description: null,
                    },
                    education_levels: [],
                    rules:{
                        name:[{required: true, message: 'Name field is REQUIRED!!'}],
                        education_level_id:[{required: true, message: 'Education Level field is REQUIRED!!'}]
                    }
                }
            },
            mounted() {
                axios.get('{{route('api.educationlevel.index')}}')
                    .then(res => {this.education_levels = res.data;
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
                            axios.post('{{route('api.schoollevel.store')}}', this.form)
                                .then(res => {
                                    swal('Success', 'Saved successfully!', 'success')
                                        .then(() => {
                                            window.location = '{{route('schoollevel.index')}}'
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
