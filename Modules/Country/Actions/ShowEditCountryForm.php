<?php

namespace Modules\Country\Actions;

use Lorisleiva\Actions\Action;
use Modules\Country\Entities\Country;

class ShowEditCountryForm extends Action
{
    /**
     * Determine if the user is authorized to make this action.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('show-edit-country-form');
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
    public function handle(Country $country)
    {
        return $country;
    }

    public function jsonResponse($result, $request)
    {
        return $result;
    }

    public function htmlResponse($result, $response)
    {
        return view('country::edit')->with('id', $result->id);
    }
}