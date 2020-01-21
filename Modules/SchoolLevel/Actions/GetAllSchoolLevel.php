<?php

namespace Modules\SchoolLevel\Actions;

use Lorisleiva\Actions\Action;
use Modules\SchoolLevel\Entities\SchoolLevel;

class GetAllSchoolLevel extends Action
{
    /**
     * Determine if the user is authorized to make this action.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('get-all-school-level');
    }

    /**
     * Get the validation rules that apply to the action.
     *
     * @return array
     */
    public function handle()
    {
        return SchoolLevel::orderBy('name')->get();
    }
}
