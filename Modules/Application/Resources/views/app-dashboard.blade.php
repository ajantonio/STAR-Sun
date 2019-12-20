@extends('application::layouts.master')

@section('css')
    <style>
        .el-card:hover{
            color: #0095ff;
        }
    </style>
@stop

@section('content_header')
    <h1>Good {{ datetimeGreeting() }}</h1>
@stop
@section('content')
    <el-row class="pb-2">
        <el-col :md="24">
            <el-row :gutter="10">
                @foreach ($apps as $app)
                    <a href="{{$app->url}}" target="_blank">
                        <el-col :md="4" :sm="8" class="mb-2">
                            <el-card shadow="hover" class="text-center">
                                <i class="{{$app->icon}} fa-2x"></i>
                                <p class="mt-3">{{$app->name}}</p>
                            </el-card>
                        </el-col>
                    </a>
                @endforeach
            </el-row>

            <el-row>
                <el-divider></el-divider>
                <el-card>
                    <template slot="header">
                        <i class="el-icon-document"></i> Recent activities
                    </template>
                </el-card>
            </el-row>
        </el-col>
    </el-row>
@stop

@section('js')
    <script>
        new Vue({
            el:'.content'
        });
    </script>
@stop