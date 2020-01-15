@extends('citymunicipality::layouts.master')
@section('content_header')
    <h1><i class="fas fa-list"></i> {{plural(config('citymunicipality.name'))}}</h1>
@stop
@section('content')
    <el-row class="pb-2">
        <el-col :md="24">
            <el-card>
                <div slot="header"><i class="el-icon-plus text-primary"></i> Create CityMunicipality</div>
                    @include("citymunicipality::components.form")
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
                        psgc:null,
                        province:null,
                        city_municipality:null,
                        population_density:null,
                        barangay_count:null,
                        //class:null
                    },
                    options: [{
                        value: 'First Class',
                        label: 'First Class'
                    }, {
                        value: 'Second Class',
                        label: 'Second Class'
                    }, {
                        value: 'Third Class',
                        label: 'Third Class'
                    }, {
                        value: 'Fourth Class',
                        label: 'Fourth Class'
                    }, {
                        value: 'Fifth Class',
                        label: 'Fifth Class'
                    }, {
                        value: 'Sixth Class',
                        label: 'Sixth Class'
                    }],
                    value: '',
                    rules:{
                        //psgc:[{ required:true, message:'Please input the psgc.' }, { min:9, message: "incomplete PSGC" }, { max:9, message: "PSGC should be 9 degits only." }],
                        province:[{ required:true, message:'Please input the province.' }],
                        city_municipality:[{ required:true, message:'Please input the city municipality.' }]
                    }
                }
            },
            mounted() {
                //execute scripts on page ready
            },
            computed:{
            },
            methods: {
                submitForm(formRefs){
                    this.$refs[formRefs].validate((valid) => {
                        if (valid) {
                            axios.post('{{route('api.citymunicipality.store')}}', this.form)
                                .then(res => {
                                    swal('Success', 'Saved successfully!', 'success')
                                        .then(() => {
                                            window.location = '{{route('citymunicipality.index')}}'
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
