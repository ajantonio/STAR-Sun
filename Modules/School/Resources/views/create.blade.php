@extends('school::layouts.master')
@section('content_header')
    <h1><i class="fas fa-list"></i> {{plural(config('school.name'))}}</h1>
@stop
@section('content')
    <el-row class="pb-2">
        <el-col :md="24">
            <el-card>
                <div slot="header"><i class="el-icon-plus text-primary"></i> Create School</div>
                <div>
                   @include('school::components.form')
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
                    rules:{},
                    barangay_district:[],
                    options:[{country:'Philippines', label:'Philippines',
                                children:[{province_state:'CAR', label:'CAR',
                                    children:[{city_municipality:'Abra',label:'Abra',
                                        children:[{barangay_district:'Bangued',label:'Bangued'}]//ABRA children closing
                                             }]
                                         }]//Philippines children closing
                            },{
                              country:'Japan', label:'Japan',
                                children:[{province_state:'Region 1', label:'Region 1',
                                    children:[{city_municipality:'Tokyo', label:'Tokyo',
                                        children:[{barangay_district:'district 2', label:'District 2'}]
                                             }]
                                         }]
                              }]//options closing
                        }//return closing
                    },//data closing
            mounted() {
                //execute scripts on page ready
            },
            computed:{
            },
            methods: {
                submitForm(formRefs){
                    this.$refs[formRefs].validate((valid) => {
                        if (valid) {
                            axios.post('{{route('api.school.store')}}', this.form)
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
                },
                handleChange(country) {
                    console.log(country+province_state+city_municipality+barangay_district);
                 }
            }
        });
    </script>
@stop
