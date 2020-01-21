@extends('school::layouts.master')
@section('content_header')
    <h1><i class="fas fa-list"></i> {{plural(config('school.name'))}}</h1>
@stop
@section('content')
    <el-row class="pb-2">
        <el-col :md="24">
            <el-card>
                <div slot="header"><i class="el-icon-view text-primary"></i> View School</div>
                <div>
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                            <tr>
                                <th>School Code</th>
                                <td>{{$school->school_code}}</td>
                            </tr>
                            <tr>
                                <th>Name</th>
                                <td>{{$school->name}}</td>
                            </tr>
                            <tr>
                                <th>General Classification</th>
                                <td>{{$school->general_classification}}</td>
                            </tr>
                            <tr>
                                <th>Address</th>
                                <td>{{$school->address}}</td>
                            </tr>
                            <tr>
                                <th>Postal Code</th>
                                <td>{{$school->postal_code}}</td>
                            </tr>
                            <tr>
                                <th>Contact Person</th>
                                <td>{{$school->contact_person}}</td>
                            </tr>
                            <tr>
                                <th>Position</th>
                                <td>{{$school->position}}</td>
                            </tr>
                            <tr>
                                <th>Mobile Number</th>
                                <td>{{$school->mobile_no}}</td>
                            </tr>
                            <tr>
                                <th>Landline Number</th>
                                <td>{{$school->landline_no}}</td>
                            </tr>
                            <tr>
                                <th>Fax Number</th>
                                <td>{{$school->fax_no}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                    <div>
                        <a href="{{route('school.index')}}">
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
                axios.get('{{route('api.school.find', $school)}}')
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
