<?php

namespace Modules\Period\Actions;

use Lorisleiva\Actions\Action;
use Modules\Period\Entities\Period;

class ShowEditPeriodForm extends Action
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
    public function handle(Period $period)
    {
        // Execute the action.
        return $period;
    }

    public function jsonResponse($result, $request)
    {
        return $result;
    }

    public function htmlResponse($result, $response)
    {
        return view('period::edit')->with('id', $result->id);
    }
}
