<el-form :model="form" :rules="rules" ref="createForm" @submit.native.prevent="submitForm('createForm')">
    <el-row :gutter="10">
        {{--Name--}}
        <el-form-item label="Name" prop="name">
            <el-input v-model="form.name"></el-input>
        </el-form-item>

        {{--Description--}}
        <el-form-item label="Description">
            <el-input v-model="form.description" type="textarea"></el-input>
        </el-form-item>

        {{--Nationality--}}
        <el-form-item label="Nationality">
            <el-input v-model="form.nationality" type="textarea"></el-input>
        </el-form-item>

        <el-form-item class="text-right">
            <el-button type="primary" native-type="submit" icon="el-icon-check">Save</el-button>
            <a href="{{route('country.index')}}">
                <el-button type="default" icon="el-icon-close">Cancel</el-button>
            </a>
        </el-form-item>
    </el-row>
</el-form>
