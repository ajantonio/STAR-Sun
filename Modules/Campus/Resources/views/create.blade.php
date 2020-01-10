@extends('campus::layouts.master')
@section('content_header')
    <h1><i class="fas fa-list"></i> {{plural(config('campus.name'))}}</h1>
@stop
@section('content')
    <el-row class="pb-2">
        <el-col :md="24">
            <el-card>
                <div slot="header"><i class="el-icon-plus text-primary"></i> Create Campus</div>
                <div>
                    @include('campus::components.form')
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
                        campus_code: null,
                        name: null,
                        description: null,
                        address: null, 
                        barangay_district: null, 
                        city_municipality: null, 
                        province_state: null, 
                        country: null, 
                        postal_code: null
                    },
                    countries: null, 

                    rules:{
                        campus_code: [{ required: true, message: 'Please input the campus code.' }],
                        name: [{ required: true, message: 'Please input the name of the campus.' }],
                        city_municipality: [{ required: true, message: 'Please input the city/municipality.' }],
                        province_state: [{ required: true, message: 'Please input the province/state.' }]
                    }
                }
            },
            mounted() {
                axios.get('{{ route('api.country.index') }}')
                    .then(res => {
                        this.countries = res.data;
                    })
                    .catch(err => {
                        new ErrorHandler().handle(err.response);
                    });
            },
            computed:{
            },
            methods: {
                countryChange() {
                    
                },

                submitForm(formRefs){
                    this.$refs[formRefs].validate((valid) => {
                        if (valid) {
                            axios.post('{{route('api.campus.store')}}', this.form)
                                .then(res => {
                                    swal('Success', 'Saved successfully!', 'success')
                                        .then(() => {
                                            window.location = '{{route('campus.index')}}'
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
