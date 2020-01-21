<?php

namespace Modules\GradeLevel\Actions;

use Lorisleiva\Actions\Action;
use Modules\GradeLevel\Entities\GradeLevel;

class StoreNewGradeLevel extends Action
{
    /**
     * Determine if the user is authorized to make this action.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('store-new-grade-level');
    }

    /**
     * Get the validation rules that apply to the action.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'required',
            'education_level_id'=>'required'
        ];
    }

    /**
     * Execute the action and return a result.
     *
     * @return mixed
     */
    public function handle(GradeLevel $gradelevel)
    {
        $gradelevel = new  GradeLevel;
        $gradelevel->name = $this->name;
        $gradelevel->education_level_id = $this->education_level_id;
        $gradelevel->description = $this->description;
        $gradelevel -> save();
        return $gradelevel;
    }
}
