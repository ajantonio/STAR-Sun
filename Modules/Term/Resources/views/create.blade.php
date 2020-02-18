@extends('term::layouts.master')
@section('content_header')
    <h1><i class="fas fa-list"></i> {{plural(config('term.name'))}}</h1>
@stop

@section('content')
    <el-row class="pb-2">
        <el-col :md="24">
            <el-card>
                <div slot="header"><i class="el-icon-plus text-primary"></i> Create Term</div>
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
                    term_cycles: [],
                    term_events: [],
                    periods: [],

                    rules: {
                        campus_id: [{required: true, message: 'Please select Campus.'}],
                        term_cycle_id: [{required: true, message: 'Please select Term Cycle.'}],
                        school_year: [{required: true, message: 'Please enter School Year.'}],
                        term: [{required: true, message: 'Please enter Term.'}],
                        is_ongoing: [{required: true, message: 'Please state if Yes or No.'}]
                    }
                }
            },
            mounted() {

                //execute scripts on page ready
                axios.get('{{route('api.campus.index')}}')
                    .then(res => {
                        this.campuses = res.data;
                    })
                    .catch(err => {
                            new ErrorHandler().handle(err.response)
                        }
                    );

                axios.get('{{route('api.termcycle.index')}}')
                    .then(res => {
                        this.term_cycles = res.data;
                    })
                    .catch(err => {
                            new ErrorHandler().handle(err.response)
                        }
                    );

                //term_events
                axios.get('{{route('api.termevent.index')}}')
                    .then(res => {
                        this.term_events = res.data;
                    })
                    .catch(err => {
                            new ErrorHandler().handle(err.response)
                        }
                    );

                //periods
                axios.get('{{route('api.period.index')}}')
                    .then(res => {
                        this.periods = res.data;
                    })
                    .catch(err => {
                            new ErrorHandler().handle(err.response)
                        }
                    );
            },

            computed: {},

            methods: {
                campusChange() {
                    if (this.form.campus_id) {
                        axios.get('/api/campus/' + this.form.campus_id + '/terms')
                            .then(result => {
                                this.campus_terms = result.data;
                            })
                            .catch(err => new ErrorHandler().handle(err.response));
                    }
                },
                getTermEventsAndPeriods() {
                    if (this.selected_term) {
                        axios.get("/api/term/" + this.selected_term + "/event_details")
                            .then(result => {
                                this.form.term_event_details = result.data.event_details;
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
                            axios.post('{{route('api.term.store')}}', this.form)
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
                removeTermEventDetail(index) {
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
