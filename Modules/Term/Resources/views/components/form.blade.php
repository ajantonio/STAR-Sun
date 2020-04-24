<el-form :model="form" :rules="rules" ref="createForm" @submit.native.prevent="submitForm('createForm')">
    {{--row:second gutter:['school_year', 'campus']--}}
    <el-row :gutter="10">
        {{--Campus--}}
        <el-col :span="24">
            <el-form-item label="Campus" prop="campus_id">
                <el-select v-model="form.campus_id" filterable placeholder="Select Campus" class="w-100"
                           @change="campusChange">
                    <el-option
                            v-for="campus in campuses"
                            :key="campus.id"
                            :label="campus.name"
                            :value="campus.id">
                    </el-option>
                </el-select>
            </el-form-item>
        </el-col>
    </el-row>

    {{--row:first gutter:['copy from']--}}
    <el-row :gutter="10">
        {{--Copy From: Campus--}}
        <el-col :span="24">
            <el-form-item label="Copy Term Details From">
                <el-select v-model="selected_term"
                           value-key="id"
                           clearable
                           filterable
                           class="w-100" @change="getTermEventsAndPeriods">
                    <el-option
                            v-for="item in campus_terms"
                            :key="item.id"
                            :label="item.school_year + '-'+item.term + ' (' + item.term_cycle.name +')'"
                            :value="item.id">
                    </el-option>
                </el-select>
            </el-form-item>
        </el-col>
    </el-row>

    <el-row :gutter="10">
        {{--School Year--}}
        <el-col :span="24">
            <el-form-item label="School Year" prop="school_year">
                <el-input-number v-model="form.school_year" class="w-100">
                </el-input-number>
            </el-form-item>
        </el-col>
    </el-row>

    {{--row:third gutter:['Term', 'Term Cycle', 'Is ongoing']--}}
    <el-row :gutter="10">
        {{--Term--}}
        <el-col :span="8">
            <el-form-item label="Term" prop="term">
                <el-input v-model="form.term">
                </el-input>
            </el-form-item>
        </el-col>

        {{--Term Cycle--}}
        <el-col :span="8">
            <el-form-item label="Term Cycle" prop="term_cycle_id">
                <el-select v-model="form.term_cycle_id" filterable placeholder="Select Term Cycle" class="w-100">
                    <el-option
                            v-for="term_cycle in term_cycles"
                            :key="term_cycle.id"
                            :label="term_cycle.name"
                            :value="term_cycle.id">
                    </el-option>
                </el-select>
            </el-form-item>
        </el-col>

        {{--Is Ongoing--}}
        <el-col :span="8">
            <el-form-item label="Is ongoing?" prop="is_ongoing"><br>
                <el-switch
                        v-model="form.is_ongoing"
                        active-value="Yes"
                        inactive-value="No">
                </el-switch>
            </el-form-item>
        </el-col>
    </el-row>

    {{--row: Term Event Details --}}
    <el-row>
        <el-card header="Term Event Details" class="card-outline card-primary">
            <el-container>
                {{--body section--}}
    <el-main style="padding: 0px;">
        <table class="table" style="width: 100%; border: 1px solid #eee;">
            <thead>
            <tr>
                <th width="40%">Event</th>
                <th width="25%">Datetime Start</th>
                <th width="25%">Datetime End</th>
                <th width="10%"></th>
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
                               icon="el-icon-delete">
                    </el-button>
                </td>
            </tr>
            </tbody>
        </table>
    </el-main>
    {{--footer section--}}
    <el-footer class="mt-3">
        <el-row>
            <el-col :span="4">
                <el-button
                        class="ml-3"
                        type="primary"
                        icon="el-icon-plus"
                        @click="addTermEventDetail">Add Item
                </el-button>
            </el-col>
            <el-col :span="20">
                <div class="d-flex flex-row-reverse bd-highlight">
                    <!-- blank -->
                </div>
            </el-col>
        </el-row>
    </el-footer>
    </el-container>
    </el-card>
    </el-row>

    {{--row: Term Period Events}}
    <el-row>
        <el-card header="Term Period Events" class="card-outline card-primary">
            <el-container>
                {{--body section--}}
    <el-main style="padding: 0px;">
        <table class="table" style="width: 100%; border: 1px solid #eee;">
            <thead>
            <tr>
                <th width="30%">Period</th>
                <th width="30%">Event</th>
                <th width="15%">Datetime Start</th>
                <th width="15%">Datetime End</th>
                <th width="10%"></th>
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
                               icon="el-icon-delete">
                    </el-button>
                </td>
            </tr>
            </tbody>
        </table>
    </el-main>
    {{--footer section--}}
    <el-footer>
        <el-row>
            <el-col :span="4">
                <el-button class="ml-3"
                           type="primary"
                           icon="el-icon-plus"
                           @click="addTermPeriodEvent">Add Item
                </el-button>
            </el-col>
            <el-col :span="20">
                <div class="d-flex flex-row-reverse bd-highlight">
                    <!-- blank -->
                </div>
            </el-col>
        </el-row>
    </el-footer>
    </el-container>
    </el-card>
    </el-row>

    {{--row:Save and Cancel--}}
    <el-row class="mt-3">
        <el-form-item class="text-right">
            <el-button type="primary" native-type="submit" icon="el-icon-check">Save
            </el-button>
            <a href="{{route('term.index')}}">
                <el-button type="default" icon="el-icon-close">Cancel
                </el-button>
            </a>
        </el-form-item>
    </el-row>


</el-form>