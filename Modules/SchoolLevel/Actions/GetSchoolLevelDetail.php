<?php

namespace Modules\SchoolLevel\Actions;

use Lorisleiva\Actions\Action;
use Modules\SchoolLevel\Entities\SchoolLevel;

class GetSchoolLevelDetail extends Action
{
    /**
     * Determine if the user is authorized to make this action.
     *
     * @return bool
     */
    public function authorize()
    {
        // return $this->user()->can('get-schoo-level-detail');
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
        return SchoolLevel::find($this->schoollevel);
    }    

}
