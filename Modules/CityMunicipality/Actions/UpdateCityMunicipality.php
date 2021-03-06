<?php

namespace Modules\CityMunicipality\Actions;

use Lorisleiva\Actions\Action;
use Modules\CityMunicipality\Entities\CityMunicipality;

class UpdateCityMunicipality extends Action
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
        return [
            'province' => "required",
            'city_municipality' => 'required'
        ];
    }

    /**
     * Execute the action and return a result.
     *
     * @return mixed
     */
    public function handle(CityMunicipality $citymunicipality)
    {
        $citymunicipality->psgc = $this->psgc;
        $citymunicipality->province = $this->province;
        $citymunicipality->city_municipality = $this->city_municipality;
        $citymunicipality->population_density = $this->population_density;
        $citymunicipality->barangay_count = $this->barangay_count;
        $citymunicipality->class = $this->class;
        $citymunicipality->save();

        return $citymunicipality;
    }
}
