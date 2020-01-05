<?php

namespace Modules\Country\Actions;

use Lorisleiva\Actions\Action;
use Modules\Country\Entities\Country;

class StoreNewCountry extends Action
{
    /**
     * Determine if the user is authorized to make this action.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('store-new-country');
    }

    /**
     * Get the validation rules that apply to the action.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required'
        ];
    }

    /**
     * Execute the action and return a result.
     *
     * @return mixed
     */
    public function handle()
    {
        $country = new Country();
        $country->name = $this->name;
        $country->description = $this->description;
        $country->nationality = $this->nationality;
        $country->save();

        return $country;
    }
}
