@extends('adminlte::page')
@section('content_header')
    <h1><i class="fas fa-user-tag"></i> User Role(s)</h1>
@stop
@section('content')
    <el-row class="pb-2">
        <el-col :md="24">
            <el-form label-width="120px" label-position="left">
                <el-card>
                    <template slot="header">
                        <i class="el-icon-plus text-primary"></i> Assign Role(s)
                    </template>
                    <el-form-item label="ID Number">
                        <el-input readonly value="{{$user->id_number}}"></el-input>
                    </el-form-item>
                    <el-form-item label="Name">
                        <el-input value="{{$user->name}}" readonly></el-input>
                    </el-form-item>
                    <el-form-item label="Email">
                        <el-input readonly value="{{$user->email}}"></el-input>
                    </el-form-item>
                    <el-form-item label="Type">
                        <el-input readonly value="{{$user->type}}"></el-input>
                    </el-form-item>
                </el-card>
                <el-card>
                    <template slot="header">
                        <i class="el-icon-collection-tag text-primary"></i> Roles
                    </template>
                    <el-checkbox-group v-model="form.roles">
                        @foreach ($roles as $role)
                            <el-checkbox label="{{$role->id}}">{{$role->name}}</el-checkbox>
                        @endforeach
                    </el-checkbox-group>
                </el-card>

                <el-row class="pt-2">
                    <el-button type="primary" icon="el-icon-check">Submit</el-button>
                </el-row>
            </el-form>
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
                        roles: []
                    }
                }
            }
        });
    </script>
@stop
