<?php

namespace Modules\CityMunicipality\Actions;

use Lorisleiva\Actions\Action;
use Modules\CityMunicipality\Entities\CityMunicipality;

class GetCityMunicipalityDetails extends Action
{
    /**
     * Determine if the user is authorized to make this action.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('get-city-municipality-details');
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
        return CityMunicipality::find($this->citymunicipality);
    }
}