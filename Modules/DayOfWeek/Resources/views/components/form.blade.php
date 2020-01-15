<el-form :model="form" :rules="rules" ref="createForm" @submit.native.prevent="submitForm('createForm')">
    <el-row :gutter="10">
        {{--Day String--}}
{{--        <el-form-item label="Day" prop="day_string">--}}
{{--            <el-input v-model="form.day_string"></el-input>--}}
{{--        </el-form-item>--}}

        <el-form-item label="Day" prop="day_string">
            <el-select v-model="form.day_string" placeholder="please select day here">
                <el-option label="Monday" value="Monday"></el-option>
                <el-option label="Tuesday" value="Tuesday"></el-option>
                <el-option label="Wednesday" value="Wednesday"></el-option>
                <el-option label="Thursday" value="Thursday"></el-option>
                <el-option label="Friday" value="Friday"></el-option>
                <el-option label="Saturday" value="Saturday"></el-option>
                <el-option label="Sunday" value="Sunday"></el-option>
            </el-select>
        </el-form-item>

        <el-form-item class="text-right">
            <el-button type="primary" native-type="submit" icon="el-icon-check">Save</el-button>
            <a href="{{route('dayofweek.index')}}">
                <el-button type="default" icon="el-icon-close">Cancel</el-button>
            </a>
        </el-form-item>
    </el-row>
</el-form>
