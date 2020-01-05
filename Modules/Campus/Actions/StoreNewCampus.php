<?php

namespace Modules\Campus\Actions;

use Illuminate\Support\Str;
use Lorisleiva\Actions\Action;
use Modules\Campus\Entities\Campus;

class StoreNewCampus extends Action
{
    /**
     * Determine if the user is authorized to make this action.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('store-new-campus');
    }

    /**
     * Get the validation rules that apply to the action.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required', 
            'city_municipality' => 'required', 
            'province_state' => 'required'
        ];
    }

    /**
     * Execute the action and return a result.
     *
     * @return mixed
     */
    public function handle()
    {
        $campus = new Campus();
        $campus->id = Str::orderedUuid()->toString();
        $campus->campus_code = $this->campus_code;
        $campus->name = $this->name;
        $campus->description = $this->description;
        $campus->address = $this->address;
        $campus->barangay_district = $this->barangay_district;
        $campus->city_municipality = $this->city_municipality;
        $campus->province_state = $this->province_state;
        $campus->country_id = $this->country['id'];
        $campus->postal_code = $this->postal_code;
        $campus->save();

        return $campus;
    }
}
