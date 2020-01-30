<el-form :model="form" :rules="rules" ref="createForm" @submit.native.prevent="submitForm('createForm')">
    <el-row :gutter="10">
        {{--School Code--}}
        <el-form-item label="School Code" prop="school_code">
            <el-input v-model="form.school_code"></el-input>
        </el-form-item>

        <el-row :gutter="20">
            <el-col :md='12'>
            {{--Name--}}
                <el-form-item label="Name" prop="name">
                    <el-input v-model="form.name"></el-input>
                </el-form-item>
            </el-col>
            <el-col :md='12'>
            {{--General Classification--}}
                <el-form-item label="General Classification" prop="general_classification">
                    <el-input v-model="form.general_classification"></el-input>
                </el-form-item>
            </el-col>
        </el-row>

        <el-row :gutter="20">
            <el-col :md="12">
            {{--Address No.--}}
                <el-form-item label="Address No./Street" prop="address" >    
                    <el-input v-model="form.address"></el-input>
                </el-form-item>
            </el-col>

            <el-col :md="12">
            {{--Barangay District--}}
                <el-form-item label="Barangay District" prop="barangay_district">    
                    <el-input v-model="form.barangay_district"></el-input>
                </el-form-item>
            </el-col>
        </el-row>

        <el-row :gutter="20">
        {{--Country--}}
        <el-col :md="8">
        <el-form-item label="Country" prop="country">
            <el-select @change="countryChange" v-model="form.country" filterable placeholder="Select Country" value-key="id" class="w-100">
                <el-option
                v-for="country in countries"
                :key="country.id"
                :label="country.name"
                :value="country.name">
                </el-option>
            </el-select>
        </el-form-item>
        </el-col>

        {{--Province State--}}
        <el-col :md="8">
        <el-form-item label="Province State" prop="province_state">
            <el-select v-model="form.province_state" filterable placeholder="Select Province" value-key="id" class="w-100">
                <el-option
                v-for="country in countries"
                :key="country.id"
                :label="country.name"
                :value="country.name">
                </el-option>
            </el-select>
        </el-form-item>
        </el-col>

        {{--City Municipality--}}
        <el-col :md="8">
        <el-form-item label="City Municipalities" prop="city_municipality">
            <el-select v-model="form.city_municipality" filterable placeholder="Select City or Municipality" value-key="id" class="w-100">
                <el-option
                v-for="country in countries"
                :key="country.id"
                :label="country.name"
                :value="country.name">
                </el-option>
            </el-select>
        </el-form-item>
        </el-col>
        </el-row>
        
        {{--Postal Code--}}
        <el-form-item label="Postal Code" prop="postal_code">
            <el-input v-model="form.postal_code"></el-input>
        </el-form-item>
        
        <el-row :gutter="20">
            {{--Contact Person--}}
            <el-col :md="12">
                <el-form-item label="Contact Person" prop="contact_person">
                    <el-input v-model="form.contact_person"></el-input>
                </el-form-item>
            </el-col>

            {{--Position--}}
            <el-col :md="12">
                <el-form-item label="Position" prop="position">
                    <el-input v-model="form.position"></el-input>
                </el-form-item>
            </el-col>

            {{--Mobile No.--}}
            <el-col :md="8">
                <el-form-item label="Mobile Number" prop="mobile_no">
                    <el-input v-model="form.mobile_no"></el-input>
                </el-form-item>
            </el-col>
       
            {{--Landline No--}}
            <el-col :md="8">
                <el-form-item label="Landline Number" prop="landline_no">
                    <el-input v-model="form.landline_no"></el-input>
                </el-form-item>
            </el-col>
            {{--fax No.--}}
            <el-col :md="8">
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
