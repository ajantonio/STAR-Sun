<el-form :model="form" :rules="rules" ref="createForm" @submit.native.prevent="submitForm('createForm')">
    <el-row :gutter="10">
        {{--Domain--}}
        <el-form-item label="Domain" prop="domain">
            <el-input v-model="form.domain"></el-input>
        </el-form-item>

        {{--Key/Value Name--}}
        <el-form-item label="Key Name">
            <el-input v-model="form.key_value_name" type="textarea"></el-input>
        </el-form-item>

        {{--Description--}}
        <el-form-item label="Description">
            <el-input v-model="form.description" type="textarea"></el-input>
        </el-form-item>

        <el-form-item class="text-right">
            <el-button type="primary" native-type="submit" icon="el-icon-check">Save</el-button>
            <a href="{{route('attribute.index')}}">
                <el-button type="default" icon="el-icon-close">Cancel</el-button>
            </a>
        </el-form-item>
    </el-row>
</el-form>
