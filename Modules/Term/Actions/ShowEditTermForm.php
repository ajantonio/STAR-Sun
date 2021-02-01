<?php

namespace Modules\Term\Actions;

use Lorisleiva\Actions\Action;
use Modules\Term\Entities\Term;

class ShowEditTermForm extends Action
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
    public function handle(Term $term)
    {
        // Execute the action.
        return $term;
    }

    public function jsonResponse($result, $request)
    {
        return $result;
    }

    public function htmlResponse($result, $response)
    {
        return view('term::edit')->with('id', $this->term);
    }
}
