<?php

namespace Modules\Indigenous\Actions;

use Lorisleiva\Actions\Action;
use Modules\Indigenous\Entities\Indigenous;

class ShowEditIndigenousForm extends Action
{
    /**
     * Determine if the user is authorized to make this action.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('show-edit-indigenous-form');
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
    public function handle(Indigenous $indigenous)
    {
        return $indigenous;
    }

    public function jsonResponse($result, $request)
    {
        return $result;
    }

    public function htmlResponse($result, $response)
    {
        return view('indigenous::edit')->with('id', $result->id);
    }
}
