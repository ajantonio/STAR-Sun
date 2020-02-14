@extends('term::layouts.master')
@section('content_header')
    <h1><i class="fas fa-list"></i> {{plural(config('term.name'))}}</h1>
@stop

@section('content')
    <el-row class="pb-2">
        <el-col :md="24">
            <el-card>
                <el-form :model="form" :rules="rules" ref="createForm" @submit.native.prevent="submitForm('createForm')">
                    <div slot="header"><i class="el-icon-edit text-primary"></i> Edit Term</div>
                    <div>
                        @include('term::components.form')
                    </div>
                    <div>
                        <el-card header="Term Event Details" class="card-outline card-primary">
                            <div>
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Event</th>
                                        <th>Datetime Start</th>
                                        <th>Datetime End</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="(event_details, index) in form.term_event_details">
                                        <td>
                                            <el-select v-model="form.term_event_details[index].term_event_id">
                                                <el-option v-for="term_event in term_events"
                                                           :key="term_event.id"
                                                           :value="term_event.id"
                                                           :label="term_event.name">
                                                </el-option>
                                            </el-select>
                                        </td>
                                        <td>
                                            <el-date-picker v-model="form.term_event_details[index].datetime_start"
                                                            type="datetime"
                                                            placeholder="Select date and time">
                                            </el-date-picker>
                                        </td>
                                        <td>
                                            <el-date-picker v-model="form.term_event_details[index].datetime_end"
                                                            type="datetime"
                                                            placeholder="Select date and time">
                                            </el-date-picker>
                                        </td>
                                        <td>
                                            <el-button @click="removeTermEventDetail(index)"
                                                       type="danger"
                                                       size="small"
                                                       icon="el-icon-minus">
                                            </el-button>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <el-button @click="addTermEventDetails"
                                           type="primary"
                                           icon="el-icon-plus">
                                </el-button>
                            </div>
                        </el-card>
                    </div>

                    <div>
                        <el-card header="Term Period Events" class="card-outline card-primary">
                            <div>
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Period</th>
                                        <th>Event</th>
                                        <th>Datetime Start</th>
                                        <th>Datetime End</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="(period_events, index) in form.term_period_events">
                                        <td>
                                            <el-select v-model="form.term_period_events[index].period_id">
                                                <el-option v-for="period in periods"
                                                           :key="period.id"
                                                           :value="period.id"
                                                           :label="period.name">
                                                </el-option>
                                            </el-select>
                                        </td>
                                        <td>
                                            <el-select v-model="form.term_period_events[index].term_event_id">
                                                <el-option v-for="term_event in term_events"
                                                           :key="term_event.id"
                                                           :value="term_event.id"
                                                           :label="term_event.name">
                                                </el-option>
                                            </el-select>
                                        </td>
                                        <td>
                                            <el-date-picker v-model="form.term_period_events[index].datetime_start"
                                                            type="datetime"
                                                            placeholder="Select date and time">
                                            </el-date-picker>
                                        </td>
                                        <td>
                                            <el-date-picker v-model="form.term_period_events[index].datetime_end"
                                                            type="datetime"
                                                            placeholder="Select date and time">
                                            </el-date-picker>
                                        </td>
                                        <td>
                                            <el-button @click="removeTermPeriodEvent(index)"
                                                       type="danger"
                                                       size="small"
                                                       icon="el-icon-minus">
                                            </el-button>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <el-button @click="addTermPeriodEvent"
                                           type="primary"
                                           icon="el-icon-plus">
                                </el-button>
                            </div>
                        </el-card>
                    </div>

                    <el-row class="mt-5">
                        <el-col>
                            <el-form-item class="text-right">
                                <el-button type="primary" native-type="submit" icon="el-icon-check">Save</el-button>
                                <a href="{{route('term.index')}}">
                                    <el-button type="default" icon="el-icon-close">Cancel</el-button>
                                </a>
                            </el-form-item>
                        </el-col>
                    </el-row>
                </el-form>
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

                        term_event_details: [],
                        term_period_events: [],
                        event_details: [],
                        period_events: []

                    },
                    campuses: null,
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
                        console.log(res.data);
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
                addTermEventDetails() {
                    this.form.term_event_details.push({});
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
