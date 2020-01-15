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

        {{--Address No.--}}
        <el-form-item label="Address No./Street" prop="address">    
            <el-input v-model="form.address"></el-input>
        </el-form-item>

        {{--Barangay District--}}
        <el-form-item label="Barangay District" prop="barangay_district">    
            <el-input v-model="form.barangay_district"></el-input>
        </el-form-item>

        {{--Country--}}
        <el-form-item label="Country" prop="country" >    
            <el-radio-group  v-model="form.country">
                <el-radio label="philippines"></el-radio>
                <el-radio label="Japan"></el-radio>
            </el-radio-group>  
        </el-form-item>

        {{--Province State--}}
        <el-form-item v-show="form.country === 'philippines'" label="Province State" prop="province_state">    
            <el-radio-group  v-model="form.province_state">
                <el-radio label="CAR">CAR</el-radio>
                <el-radio label="NCR">NCR</el-radio>
            </el-radio-group>  
        </el-form-item>

        {{--City Municipality--}}
        <el-form-item v-show="form.province_state === 'NCR' && form.country ==='philippines'" label="City Municipality" prop="city_municipality">    
           
                <el-radio v-model="form.city_municipality" label="Taguig">Taguig</el-radio>
                <el-radio v-model="form.city_municipality" label="Makati">Makati</el-radio>
           
        </el-form-item>
        
        {{--Postal Code--}}
        <el-form-item label="Postal Code" prop="postal_code">
            <el-input v-model="form.postal_code"></el-input>
        </el-form-item>
        
        <el-row type="text">
            {{--Contact Person--}}
            <el-col :span="12">
                <el-form-item label="Contact Person" prop="contact_person">
                    <el-input v-model="form.contact_person"></el-input>
                </el-form-item>
            </el-col>

            {{--Position--}}
            <el-col :span="12">
                <el-form-item label="Position" prop="position">
                    <el-input v-model="form.position"></el-input>
                </el-form-item>
            </el-col>

            {{--Mobile No.--}}
            <el-col :span="8">
                <el-form-item label="Mobile Number" prop="mobile_no">
                    <el-input v-model="form.mobile_no"></el-input>
                </el-form-item>
            </el-col>
       
            {{--Landline No--}}
            <el-col :span="8">
                <el-form-item label="Landline Number" prop="landline_no">
                    <el-input v-model="form.landline_no"></el-input>
                </el-form-item>
            </el-col>
            {{--fax No.--}}
            <el-col :span="8">
                <el-form-item label="Fax Number" prop="fax_no">
                    <el-input v-model="form.fax_no"></el-input>
                </el-form-item>
            </el-col>
        </el-row>

        <el-form-item class="text-right">
            <el-button type="primary" native-type="submit" icon="el-icon-check">Save</el-button>
            <a href="{{route('school.index')}}">
                <el-button type="default" icon="el-icon-close">Cancel</el-button>
            </a>
        </el-form-item>
    </el-row>
   
</el-form>
