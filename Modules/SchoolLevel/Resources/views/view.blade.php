@extends('schoollevel::layouts.master')
@section('content_header')
    <h1><i class="fas fa-list"></i> {{plural(config('schoollevel.name'))}}</h1>
@stop
@section('content')
    <el-row class="pb-2">
        <el-col :md="24">
            <el-card>
                <div slot="header"><i class="el-icon-view text-primary"></i> View SchoolLevel</div>
                <div>
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                            <tr>
                                <th>Label</th>
                                <td>Value</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                    <div>
                        <a href="{{route('schoollevel.index')}}">
                            <el-button type="default" icon="el-icon-back">Back</el-button>
                        </a>
                    </div>
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
                    form: {}
                }
            },
            mounted() {
                //execute scripts on page ready
                axios.get('{{route('api.schoollevel.find', $schoollevel)}}')
                    .then(res => {
                        this.form = res.data;
                    })
                    .catch(err => {
                        new ErrorHandler().handle(err.response);
                    });
            },
            computed: {},
            methods: {}
        });
    </script>
@stop
