<?php

namespace Modules\school\Actions;

use Lorisleiva\Actions\Action;
use Modules\School\Entities\School;

class ShowCreateschoolForm extends Action
{
    /**
     * Determine if the user is authorized to make this action.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('show-createschool-form');
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
        return view('school::create');
    }
}
