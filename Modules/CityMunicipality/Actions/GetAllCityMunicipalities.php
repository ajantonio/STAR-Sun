<?php

namespace Modules\CityMunicipality\Actions;

use Lorisleiva\Actions\Action;
use Modules\CityMunicipality\Entities\CityMunicipality;

class GetAllCityMunicipalities extends Action
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
    public function handle()
    {
        return CityMunicipality::orderBy('city_municipality')->get();
    }
}
