@extends('permission::layouts.master')
@section('content_header')
    <h1>Permission</h1>
@stop
@section('content')
    <el-row class="pb-2">
        <el-col :md="24">
            <el-card>
                <div slot="header"><i class="fa fa-plus text-primary"></i> Create Permission</div>
                <div>
                    <el-form :model="form" :rules="rules" ref="createForm" >
                        <h1>Form here</h1>
                        <el-form-item class="text-right">
                            <el-button type="primary" @click="submitForm('createForm')"><i class="fa fa-check"></i> Save</el-button>
                            <a href="{{route('permission.index')}}">
                                <el-button><i class="fa fa-times"></i> Cancel</el-button>
                            </a>
                        </el-form-item>
                    </el-form>
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
                    rules:{}
                }
            },
            mounted() {
                //execute scripts on page ready
            },
            computed:{
            },
            methods: {
                submitForm(formRefs){
                    this.$refs[formRefs].validate((valid) => {
                        if (valid) {
                            axios.post('{{route('api.permission.store')}}', this.form)
                                .then(res => {
                                    swal('Success', 'Saved successfully!', 'success')
                                        .then(() => {
                                            window.location = '{{route('permission.index')}}'
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