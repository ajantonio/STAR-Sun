<el-form :model="form" :rules="rules" ref="createForm" @submit.native.prevent="submitForm('createForm')">
    <el-row :gutter="10">

        {{--Term Id--}}
        <el-form-item label="Term" prop="term_id">
            <el-select v-model="form.term_id" filterable placeholder="Select Term"  class="w-100">
                <el-option
                        v-for="term in terms"
                        :key="term.id"
                        :label="term.term"
                        :value="term.id">
                </el-option>
            </el-select>
        </el-form-item>

        {{--Period Id--}}
        <el-form-item label="Period" prop="period_id">
            <el-select v-model="form.period_id" filterable placeholder="Select Period" value-key="id"  class="w-100">
                <el-option
                        v-for="period in periods"
                        :key="period.id"
                        :label="period.name"
                        :value="period.id">
                </el-option>
            </el-select>
        </el-form-item>

        {{--Term Event Id--}}
        <el-form-item label="Term Event" prop="term_event_id">
            <el-select v-model="form.term_event_id" filterable placeholder="Select Term Event"  class="w-100">
                <el-option
                        v-for="term_event in term_events"
                        :key="term_event.id"
                        :label="term_event.name"
                        :value="term_event.id">
                </el-option>
            </el-select>
        </el-form-item>

        <el-form-item label="Datetime Start" prop="datetime_start">
            <el-date-picker
                    v-model="form.datetime_start"
                    type="datetime"
                    placeholder="Select date and time">
            </el-date-picker>
        </el-form-item>

        <el-form-item label="Datetime End" prop="datetime_end">
            <el-date-picker
                    v-model="form.datetime_end"
                    type="datetime"
                    placeholder="Select date and time">
            </el-date-picker>
        </el-form-item>

        <el-form-item class="text-right">
            <el-button type="primary" native-type="submit" icon="el-icon-check">Save</el-button>
            <a href="{{route('termeventdetail.index')}}">
                <el-button type="default" icon="el-icon-close">Cancel</el-button>
            </a>
        </el-form-item>
    </el-row>
</el-form>
