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
                    myJson:[],
                    form: {
                        school_code: null,
                        name: null,
                        general_classification: null,
                        address: null,
                        barangay_district: null,
                        country: null,
                        province_state: null,
                        city_municipality: null,
                        postal_code: null,
                        contact_person: null,
                        position: null,
                        mobile_no: null,
                        landline_no: null,
                        fax_no: null,

                    },
                    countries:[],
                    city_municipalies:[],
                    rules:{
                        school_code:[{required:true, message:'School code is REQUIRED!!'}],
                        name:[{required:true, message:'Name is REQUIRED!!'}],
                        general_classification:[{required:true, message:'General classification is REQUIRED!!'}],
                        address:[{required:true, message:'Address is REQUIRED!!'}],
                        barangay_district:[{required:true, message:'Barangay District is REQUIRED!!'}],
                        country:[{required:true, message:'Country is REQUIRED!!'}],
                        province_state:[{required:true, message:'Province state is REQUIRED!!'}],
                        contact_person:[{required:true, message:'Contact person is REQUIRED!!'}],
                    },
                }
            },
            mounted() {
                axios.get('{{route('api.country.index')}}')
                    .then(res => {this.countries = res.data;
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
                countryChange() {
                    this.form.province_state = null;
                    this.province_state = null;
                    this.form.city_municipalitiy = null;
                    this.city_municipality = null;
                   

                    if (this.form.country) {

                        axios.get('/api/school/' + this.form.school.id + '/resources')
                            .then(res => {
                                this.resource_groups = res.data;
                            })
                            .catch(err => {
                                new ErrorHandler().handle(err.response);
                            });
                    }
                },
            }
        });
    </script>
@stop
