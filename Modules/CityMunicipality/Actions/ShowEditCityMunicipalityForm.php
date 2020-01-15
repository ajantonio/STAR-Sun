<?php

namespace Modules\CityMunicipality\Actions;

use Lorisleiva\Actions\Action;

class ShowEditCityMunicipalityForm extends Action
{
    /**
     * Determine if the user is authorized to make this action.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('show-edit-city-municipality-form');
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
        return view("citymunicipality::edit")->with('id', $this->citymunicipality);
    }
}
