<el-form :model="form" :rules="rules" ref="createForm" @submit.native.prevent="submitForm('createForm')">
    <el-row :gutter="10">

        {{--Province--}}
        <el-form-item label="Province" prop="province">
            <el-input v-model="form.province"></el-input>
        </el-form-item>

        {{--City--}}
        <el-form-item label="City Municipality" prop="city_municipality">
            <el-input v-model="form.city_municipality"></el-input>
        </el-form-item>

        <el-row :gutter="10">
            {{--PSGC--}}
            <el-col :md="12">
                <el-form-item label="Philippine Standard Geographic Code (PSGC)" prop="psgc">
                    <el-input v-model="form.psgc" type="number"></el-input>
                </el-form-item>
            </el-col>

            {{--population--}}
            <el-col :md="12">
                <el-form-item label="Population Density" prop="population_density">
                    <el-input v-model="form.population_density"></el-input>
                </el-form-item>
            </el-col>
        </el-row>

        <el-row :gutter="10">
            {{--BRGY count--}}
            <el-col :md="12">
                <el-form-item label="Barangay Count" prop="barangay_count">
                    <el-input v-model="form.barangay_count" type="number"></el-input>
                </el-form-item>
            </el-col>

            {{--Class--}}
            <el-col :md="12">
                <el-form-item label="Class" prop="class">
                    <el-select v-model="form.class" placeholder="Select" class="w-100">
                        <el-option
                                v-for="item in options"
                                :key="item.value"
                                :label="item.label"
                                :value="item.value">
                        </el-option>
                    </el-select>
                </el-form-item>
            </el-col>
        </el-row>

        <el-form-item class="text-right">
            <el-button type="primary" native-type="submit" icon="el-icon-check">Save</el-button>
            <a href="{{route('citymunicipality.index')}}">
                <el-button type="default" icon="el-icon-close">Cancel</el-button>
            </a>
        </el-form-item>
    </el-row>
</el-form>