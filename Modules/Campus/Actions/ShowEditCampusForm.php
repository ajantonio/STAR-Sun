<?php

namespace Modules\Campus\Actions;

use Lorisleiva\Actions\Action;
use Modules\Campus\Entities\Campus;

class ShowEditCampusForm extends Action
{
    /**
     * Determine if the user is authorized to make this action.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('show-edit-campus-form');
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
    public function handle(Campus $campus)
    {
        return $campus;
    }

    public function jsonResponse($result, $request)
    {
        return $result;
    }

    public function htmlResponse($result, $response)
    {
        return view('campus::edit')->with('id', $result->id);
    }
}
