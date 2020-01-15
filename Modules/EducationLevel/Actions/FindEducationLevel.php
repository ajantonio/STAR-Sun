<?php

namespace Modules\EducationLevel\Actions;

use Lorisleiva\Actions\Action;
use Modules\EducationLevel\Entities\EducationLevel;

class FindEducationLevel extends Action
{
    /**
     * Determine if the user is authorized to make this action.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('find-education-level');
    }

    /**
     * Get the validation rules that apply to the action.
     *
     * @return array
     */
    public function rules()
    {
        return [];
    }

    /**
     * Execute the action and return a result.
     *
     * @return mixed
     */
    public function handle(EducationLevel $educationlevel)
    {
        return $educationlevel;
    }
}
