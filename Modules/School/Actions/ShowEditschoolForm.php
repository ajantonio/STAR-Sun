<?php

namespace Modules\school\Actions;

use Lorisleiva\Actions\Action;
use Modules\School\Entities\School;

class ShowEditschoolForm extends Action
{
    /**
     * Determine if the user is authorized to make this action.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('show-editschool-form');
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
    public function handle(School $school)
    {
        return $school;
    }

    public function jsonResponse($result, $request)
    {
        return $result;
    }

    public function htmlResponse($result, $response)
    {
        return view('school::edit')->with('id', $result->id);
    }
}
