<el-form :model="form" :rules="rules" ref="createForm" @submit.native.prevent="submitForm('createForm')">
    <el-row :gutter="10">
        {{--Campus Id--}}
        <el-form-item label="Campus Id" prop="name">
            <el-input v-model="form.campus_id"></el-input>
        </el-form-item>
        <el-form-item label="Term Cycle Id" prop="name">
            <el-input v-model="form.term_cycle_id"></el-input>
        </el-form-item>
        <el-form-item label="School Year" prop="name">
            <el-input v-model="form.school_year"></el-input>
        </el-form-item>
        <el-form-item label="Term" prop="name">
            <el-input v-model="form.term"></el-input>
        </el-form-item>
        <el-form-item label="Is ongoing" prop="name">
            <el-input v-model="form.is_ongoing"></el-input>
        </el-form-item>

{{--        --}}{{--Term Cycle Id--}}
{{--        <el-form-item label="Term Cycle Id">--}}
{{--            <el-input v-model="form.term_cycle_id" type="textarea"></el-input>--}}
{{--        </el-form-item>--}}

        <el-form-item class="text-right">
            <el-button type="primary" native-type="submit" icon="el-icon-check">Save</el-button>
            <a href="{{route('term.index')}}">
                <el-button type="default" icon="el-icon-close">Cancel</el-button>
            </a>
        </el-form-item>
    </el-row>
</el-form>
