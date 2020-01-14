@extends('school::layouts.master')
@section('content_header')
    <h1><i class="fas fa-list"></i> {{plural(config('school.name'))}}</h1>
@stop
@section('content')
    <el-row class="pb-2">
        <el-col :md="24">
            <el-card>
                <div slot="header"><i class="el-icon-edit text-primary"></i> Edit School</div>
                <div>
                    <el-form :model="form" :rules="rules" ref="editForm"
                             @submit.native.prevent="submitForm('editForm')">
                        <h1>Form here</h1>
                        <el-form-item class="text-right">
                            <el-button type="primary" native-type="submit" icon="el-icon-check">Save</el-button>
                            <a href="{{route('school.index')}}">
                                <el-button type="default" icon="el-icon-close">Cancel</el-button>
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
                    rules: {}
                }
            },
            mounted() {
                //execute scripts on page ready
                axios.get('{{route('api.school.find', $school)}}')
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
                            axios.put('{{route('api.school.update', $id)}}', this.form)
                                .then(res => {
                                    swal('Success', 'Saved successfully!', 'success')
                                        .then(() => {
                                            window.location = '{{route('school.index')}}'
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
