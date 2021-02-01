<?php

namespace Modules\TermCycle\Actions;

use Lorisleiva\Actions\Action;
use Modules\TermCycle\Entities\TermCycle;

class ShowEditTermCycleForm extends Action
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
    public function handle(TermCycle $termcycle)
    {
        // Execute the action.
        return $termcycle;
    }

    public function jsonResponse($result, $request)
    {
        return $result;
    }

    public function htmlResponse($result, $response)
    {
        return view('termcycle::edit')->with('id', $result->id);
    }
}
