@extends('termcycle::layouts.master')
@section('content_header')
    <h1><i class="fas fa-list"></i> {{plural(config('termcycle.name'))}}</h1>
@stop
@section('content')
    <el-row class="pb-2">
        <el-col :md="24">
            <el-card>
                <div slot="header"><i class="el-icon-view text-primary"></i> View Term Cycle</div>
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
                        <a href="{{route('termcycle.index')}}">
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
                axios.get('{{route('api.termcycle.find', $termcycle)}}')
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
