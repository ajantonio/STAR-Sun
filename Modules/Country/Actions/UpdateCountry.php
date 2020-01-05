<?php

namespace Modules\Country\Actions;

use Lorisleiva\Actions\Action;
use Modules\Country\Entities\Country;

class UpdateCountry extends Action
{
    /**
     * Determine if the user is authorized to make this action.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('update-country');
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
        $country->name = $this->name;
        $country->description = $this->description;
        $country->nationality = $this->nationality;
        $country->save();

        return $country;
    }
}
