<el-form :model="form" :rules="rules" ref="createForm" @submit.native.prevent="submitForm('createForm')">
    <el-row :gutter="10">
        {{--Campus Code--}}
        <el-form-item label="Campus Code" prop="campus_code">
            <el-input v-model="form.campus_code"></el-input>
        </el-form-item>

        {{--Name--}}
        <el-form-item label="Name" prop="name">
            <el-input v-model="form.name"></el-input>
        </el-form-item>

        {{--Description--}}
        <el-form-item label="Description">
            <el-input v-model="form.description" type="text"></el-input>
        </el-form-item>

        {{--Address--}}
        <el-form-item label="Address">
            <el-input v-model="form.address" type="text"></el-input>
        </el-form-item>

        {{--Barangay/District --}}
        <el-form-item label="Barangay/District">
            <el-input v-model="form.barangay_district" type="text"></el-input>
        </el-form-item>

        {{--City/Municipality--}}
        <el-form-item label="City/Municipality" prop="city_municipality">
            <el-input v-model="form.city_municipality" type="text"></el-input>
        </el-form-item>

        {{--Province/State--}}
        <el-form-item label="Province/State" prop="province_state">
            <el-input v-model="form.province_state" type="text"></el-input>
        </el-form-item>

        {{--Country--}}
        <el-form-item label="Country">
            <el-select v-model="form.country" value-key="id" clearable filterable class="w-100">
                <el-option v-for="item in countries"
                        :value="item"
                        :label="item.name"
                        :key="item.id">
                </el-option>
            </el-select>                            
        </el-form-item>

        {{--Postal Code--}}
        <el-form-item label="Postal Code">
            <el-input v-model="form.postal_code" type="text"></el-input>
        </el-form-item>
    </el-row>

    <el-form-item class="text-right">
        <el-button type="primary" native-type="submit" icon="el-icon-check">Save</el-button>
        <a href="{{route('campus.index')}}">
            <el-button type="default" icon="el-icon-close">Cancel</el-button>
        </a>
    </el-form-item>
</el-form>