<el-form :model="form" :rules="rules" ref="link_form">
    <el-row :gutter="10">
        {{--Title--}}
        <el-form-item label="Title" prop="title">
            <el-input v-model="form.title"></el-input>
        </el-form-item>

        {{--Application--}}
        <el-col :md="12">
            <el-form-item label="Application" prop="application">
                <el-select v-model="form.application" value-key="id" clearable filterable class="w-100" @change="applicationChange">
                    <el-option v-for="item in applications"
                               :value="item"
                               :label="item.name"
                               :key="item.id">
                    </el-option>
                </el-select>
            </el-form-item>
        </el-col>

        {{--Service Group--}}
        <el-col :md="12">
            <el-form-item label="Resource Group" prop="resource_group">
                <el-select v-model="form.resource_group" value-key="id" clearable filterable class="w-100" @change="resourceGroupChange">
                    <el-option v-for="item in resource_groups"
                               :value="item"
                               :label="item.name"
                               :key="item.id">
                    </el-option>
                </el-select>
            </el-form-item>
        </el-col>

        {{--Parent Link--}}
        <el-col :md="12">
            <el-form-item label="Parent Link">
                <el-select v-model="form.parent_link" value-key="id" clearable filterable class="w-100">
                    <el-option v-for="item in parent_links"
                               :value="item"
                               :label="item.title"
                               :key="item.id">
                    </el-option>
                </el-select>
            </el-form-item>
        </el-col>

        {{--Permission--}}
        <el-col :md="12">
            <el-form-item label="Permission">
                <el-select v-model="form.permission" placeholder="Allowed All" clearable filterable class="w-100">
                    <el-option v-for="item in permissions"
                               :value="item"
                               :label="item.name"
                               :key="item.id"
                    >
                    </el-option>
                </el-select>
            </el-form-item>
        </el-col>

    </el-row>

    <el-row :gutter="10">
        {{--Description--}}
        <el-col :md="12">
            <el-form-item label="Description">
                <el-input v-model="form.description" type="textarea"></el-input>
            </el-form-item>
        </el-col>

        {{--URL--}}
        <el-col :md="12">
            <el-form-item label="URL" prop="url">
                <el-input v-model="form.url" placeholder="/link"></el-input>
            </el-form-item>
        </el-col>

    </el-row>

    <el-row :gutter="10">
        {{--Icon--}}
        <el-col :md="8">
            <el-form-item label="Icon" prop="icon">
                <el-input v-model="form.icon" placeholder="fa fa-list"></el-input>
            </el-form-item>
        </el-col>

        {{--Active Pattern--}}
        <el-col :md="8">
            <el-form-item label="Active Pattern" prop="active_pattern">
                <el-input v-model="form.active_pattern"></el-input>
            </el-form-item>
        </el-col>

        {{--Order--}}
        <el-col :md="8">
            <el-form-item label="Order" prop="order">
                <el-input-number v-model="form.order" :min="0" class="w-100"></el-input-number>
            </el-form-item>
        </el-col>
    </el-row>

    <el-form-item class="text-right">
        <el-button type="primary" @click="submitForm('link_form')"><i class="fa fa-check"></i> Save</el-button>
        <a href="{{ route('link.index') }}">
            <el-button><i class="fa fa-times"></i> Cancel</el-button>
        </a>
    </el-form-item>
</el-form>