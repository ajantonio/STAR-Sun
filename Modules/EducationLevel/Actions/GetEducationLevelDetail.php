<?php

namespace Modules\EducationLevel\Actions;

use Lorisleiva\Actions\Action;
use Modules\EducationLevel\Entities\EducationLevel;

class GetEducationLevelDetail extends Action
{
     /**
     * Determine if the user is authorized to make this action.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
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
    public function handle()
    {
        return EducationLevel::find($this->educationlevel);
    }    
}
