@extends('role::layouts.master')
@section('content_header')
    <h1>Role</h1>
@stop
@section('content')
    <el-row class="pb-2">
        <el-col :md="24">
            <el-card>
                <div slot="header"><i class="fa fa-plus text-primary"></i> Create Role</div>
                <div>
                    <el-form @submit.native.prevent :model="form" :rules="rules" ref="createForm">
                        <el-form-item label="Name" prop="name">
                            <el-input v-model="form.name"></el-input>
                        </el-form-item>

                        <el-form-item label="Description" prop="description">
                            <el-input v-model="form.description" type="textarea"></el-input>
                        </el-form-item>

                        <el-form-item class="text-right">
                            <el-button type="primary" @click="submitForm('createForm')"><i class="fa fa-check"></i> Save</el-button>
                            <a href="{{route('role.index')}}">
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
                    form: {
                        name: null,
                        description: null,
                    },
                    rules: {
                        name: {required: true, message: 'Please input name.'}
                    }
                }
            },
            mounted() {
                //execute scripts on page ready
            },
            computed: {},
            methods: {
                submitForm(formRefs) {
                    this.$refs[formRefs].validate((valid) => {
                        if (valid) {
                            axios.post('{{route('api.role.store')}}', this.form)
                                .then(res => {
                                    swal('Success', 'Saved successfully!', 'success')
                                        .then(() => {
                                            window.location = '{{route('role.index')}}'
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