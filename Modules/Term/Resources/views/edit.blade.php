@extends('term::layouts.master')
@section('content_header')
    <h1><i class="fas fa-list"></i> {{plural(config('term.name'))}}</h1>
@stop

@section('content')
    <el-row class="pb-2">
        <el-col :md="24">
            <el-card>
                    <div slot="header"><i class="el-icon-edit text-primary"></i> Edit Term</div>
                    <div>
                        @include('term::components.form')
                    </div>

            </el-card>
        </el-col>
    </el-row>
@stop

@section('js')
    <script>
        let app = new Vue({
            el: '.content',
            data() {
                return {
                    form: {
                        campus_id: null,
                        term_cycle_id: null,
                        school_year: null,
                        term: null,
                        is_ongoing: null,

                        event_details: [],
                        period_events: [],
                        term_event_details: [],
                        term_period_events: [],
                    },
                    selected_term: null,
                    campuses: [],
                    campus_terms: [],
                    term_cycles: null,
                    term_events: [],
                    periods: [],
                    rules: {
                        campus_id: [{required: true, message: 'Please select Campus.'}],
                        term_cycle_id: [{required: true, message: 'Please select Term Cycle.'}]
                    }
                }
            },
            mounted() {
                //execute scripts on page ready
                axios.get('{{route('api.term.find', ['term'=>$id, 'with'=>'event_details,period_events'])}}')
                    .then(res => {
                        this.form.campus_id = res.data.campus_id;
                        this.form.term_cycle_id = res.data.term_cycle_id;
                        this.form.school_year = res.data.school_year;
                        this.form.term = res.data.term;
                        this.form.is_ongoing = res.data.is_ongoing;

                        $.extend(this.form.term_event_details , res.data.event_details);
                        $.extend(this.form.term_period_events , res.data.period_events);

                        // this.form.term_event_details = res.data.event_details;
                        // console.log(res.data);
                        // console.log("==============================");
                        // console.log(this.form.term_event_details);
                    })
                    .catch(err => {
                        new ErrorHandler().handle(err.response);
                    });



                axios.get('{{route('api.campus.index')}}')
                    .then(res => {
                        this.campuses = res.data;
                        // console.log(res.data);
                    })
                    .catch(err => {
                        new ErrorHandler().handle(err.response);
                    });

                axios.get('{{route('api.termcycle.index')}}')
                    .then(res => {
                        this.term_cycles = res.data;
                        // console.log(res.data);
                    })
                    .catch(err => {
                        new ErrorHandler().handle(err.response);
                    });

                axios.get('{{route('api.termevent.index')}}')
                    .then(res => {
                        this.term_events = res.data;
                        // console.log("====Events========");
                        // console.log(this.term_events);
                    })
                    .catch(err => {new ErrorHandler().handle(err.response)}
                    );

                axios.get('{{route('api.period.index')}}')
                    .then(res => {this.periods = res.data;
                    })
                    .catch(err => {new ErrorHandler().handle(err.response)}
                    );
            },
            computed: {},
            methods: {
                campusChange() {
                    if (this.form.campus_id) {
                        axios.get('/api/campus/' + this.form.campus_id + '/terms')
                            .then(result => {
                                this.campus_terms = result.data;
                                // console.log(result.data);
                            })
                            .catch(err => new ErrorHandler().handle(err.response));
                    }
                },
                getTermEventsAndPeriods() {
                    if (this.selected_term) {
                        axios.get("/api/term/" + this.selected_term + "/event_details")
                            .then(result => {
                                this.form.term_event_details = result.data.event_details;
                                console.log(result.data.event_details);
                            })
                            .catch(err => new ErrorHandler().handle(err.response));


                        axios.get("/api/term/" + this.selected_term + "/period_events")
                            .then(result => {
                                this.form.term_period_events = result.data.period_events;
                            })
                            .catch(err => new ErrorHandler().handle(err.response));
                    }
                },
                addTermEventDetail() {
                    this.form.term_event_details.push({});
                },
                submitForm(formRefs) {
                    this.$refs[formRefs].validate((valid) => {
                        if (valid) {
                            axios.put('{{route('api.term.update', $id)}}', this.form)
                                .then(res => {
                                    swal('Success', 'Saved successfully!', 'success')
                                        .then(() => {
                                            window.location = '{{route('term.index')}}'
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
                removeTermEventDetail(index){
                    this.form.term_event_details.splice(index, 1);
                },
                addTermPeriodEvent() {
                    this.form.term_period_events.push({});
                },
                removeTermPeriodEvent(index) {
                    this.form.term_period_events.splice(index, 1);
                }
            }
        });
    </script>
@stop
