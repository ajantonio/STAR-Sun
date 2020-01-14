<el-form :model="form" :rules="rules" ref="createForm" @submit.native.prevent="submitForm('createForm')">
    <el-row :gutter="10">
        {{--School Code--}}
        <el-form-item label="School Code" prop="school_code">
            <el-input v-model="form.school_code"></el-input>
        </el-form-item>
        {{--Name--}}
        <el-form-item label="Name" prop="name">
            <el-input v-model="form.name"></el-input>
        </el-form-item>
        {{--General Classification--}}
        <el-form-item label="General Classification" prop="general_classification">
            <el-input v-model="form.general_classification"></el-input>
        </el-form-item>

        <el-form-item label="Address" prop="adress">
           <el-cascader class="col-md-6"
            :options="options"
            :props="{ multiple: true, checkStrictly: true }"
            clearable>
           </el-cascader>          
        </el-form-item>
        
<!--
        {{--Barangay/District--}}
        <el-form-item label="Barangay/District" prop="barangay_district">
            <el-input v-model="form.barangay_district"></el-input>
        </el-form-item>

        {{--City/Municipality--}}
        <el-form-item label="City/Municipality" prop="city_municipality">
            <el-input v-model="form.city_municipality"></el-input>
        </el-form-item>
        {{--Province/State--}}
        <el-form-item label="Province/State" prop="province_state">
            <el-input v-model="form.province-state"></el-input>
        </el-form-item>
        {{--Country--}}
        <el-form-item label="Country" prop="country">
            <el-input v-model="form.country"></el-input>
        </el-form-item>
-->
        {{--Postal Code--}}
        <el-form-item label="Postal Code" prop="postal_code">
            <el-input v-model="form.postal_code"></el-input>
        </el-form-item>
        {{--Contact Person--}}
        <el-form-item label="Contact Person" prop="contact_person">
            <el-input v-model="form.contact_person"></el-input>
        </el-form-item>
        {{--Position--}}
        <el-form-item label="Position" prop="position">
            <el-input v-model="form.position"></el-input>
        </el-form-item>
        {{--Mobile No.--}}
        <el-form-item label="Mobile Number" prop="mobile_no">
            <el-input v-model="form.mobile_no"></el-input>
        </el-form-item>
        {{--Landline No--}}
        <el-form-item class="col" label="Landline Number" prop="landline_no">
            <el-input size="small" v-model="form.landline_no"></el-input>
         </el-form-item>
        {{--fax No.--}}
        <el-form-item class="col" label="Fax Number" prop="fax_no">
            <el-input v-model="form.fax_no"></el-input>
        </el-form-item>

        <el-form-item class="text-right">
            <el-button type="primary" native-type="submit" icon="el-icon-check">Save</el-button>
            <a href="{{route('school.index')}}">
                <el-button type="default" icon="el-icon-close">Cancel</el-button>
            </a>
        </el-form-item>
    </el-row>
   
</el-form>
