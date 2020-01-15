<?php

namespace Modules\School\Actions;

use Lorisleiva\Actions\Action;
use Modules\School\Entities\School;

class GetSchoolDetail extends Action
{
     /**
     * Determine if the user is authorized to make this action.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('show-school');
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
        return School::find($this->school);
    }    
}
