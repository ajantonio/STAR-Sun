<?php

namespace Modules\EducationLevel\Actions;

use Lorisleiva\Actions\Action;
use Modules\EducationLevel\Entities\EducationLevel;

class UpdateEducationLevel extends Action
{
    /**
     * Determine if the user is authorized to make this action.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('update-education-level');
    }

    /**
     * Get the validation rules that apply to the action.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>"required|unique:sm_commondb_con.education_levels,name,{$this->educationlevel}",
        ];
    }

    /**
     * Execute the action and return a result.
     *
     * @return mixed
     */
    public function handle(EducationLevel $educationlevel)
    {
        $educationlevel->name = $this->name;
        $educationlevel->description = $this->description;
        $educationlevel->save();

        return $educationlevel;
    }
}
