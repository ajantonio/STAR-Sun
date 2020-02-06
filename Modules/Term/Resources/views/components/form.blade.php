{{--<el-form :model="form" :rules="rules" ref="createForm" @submit.native.prevent="submitForm('createForm')">--}}
    <el-row :gutter="10">
        {{--Campus Id--}}
        <el-col :md="12">
            <el-form-item label="Campus" prop="campus_id">
                <el-select v-model="form.campus_id" filterable placeholder="Select Campus"  class="w-100">
                    <el-option
                            v-for="campus in campuses"
                            :key="campus.id"
                            :label="campus.name"
                            :value="campus.id">
                    </el-option>
                </el-select>
            </el-form-item>
        </el-col>

        {{--Term Cycle Id--}}
        <el-col :md="12">
            <el-form-item label="Term Cycle" prop="term_cycle_id">
                <el-select v-model="form.term_cycle_id" filterable placeholder="Select Term Cycle"  class="w-100">
                    <el-option
                            v-for="term_cycle in term_cycles"
                            :key="term_cycle.id"
                            :label="term_cycle.name"
                            :value="term_cycle.id">
                    </el-option>
                </el-select>
            </el-form-item>
        </el-col>

        <el-col :md="10">
            <el-form-item label="School Year" prop="school_year">
                <el-input-number v-model="form.school_year" class="w-100"></el-input-number>
            </el-form-item>
        </el-col>

        <el-col :md="8">
            <el-form-item label="Term" prop="term">
                <el-input v-model="form.term"></el-input>
            </el-form-item>
        </el-col>

        <el-col :md="6">
            <el-form-item label="Is ongoing" prop="is_ongoing">
                {{--<el-input v-model="form.is_ongoing"></el-input>--}}
                <br>
                <el-switch
                        v-model="form.is_ongoing"
                        active-value="Yes"
                        inactive-value="No">
                </el-switch>
            </el-form-item>
        </el-col>

{{--        <el-form-item class="text-right">--}}
{{--            <el-button type="primary" native-type="submit" icon="el-icon-check">Save</el-button>--}}
{{--            <a href="{{route('term.index')}}">--}}
{{--                <el-button type="default" icon="el-icon-close">Cancel</el-button>--}}
{{--            </a>--}}
{{--        </el-form-item>--}}
    </el-row>
{{--</el-form>--}}
