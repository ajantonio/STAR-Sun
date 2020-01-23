<?php

namespace Modules\school\Actions;

use Lorisleiva\Actions\Action;
use Modules\School\Entities\School;

class Updateschool extends Action
{
    /**
     * Determine if the user is authorized to make this action.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('update-school');
    }

    /**
     * Get the validation rules that apply to the action.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'school_code' => 'required||unique',
            'name'=> 'required',
            'general_classification'=> 'required',
            'address'=> 'required',
            'barangay_district' => 'required',
            'city_municipality' => 'required',
            'province_state' => 'required',
            'country' => 'required',
            'contact_person' => 'required',
        ];
    }

    /**
     * Execute the action and return a result.
     *
     * @return mixed
     */
    public function handle(School $school)
    {
        $school->school_code = $this->school_code;
        $school->name = $this->name;
        $school->general_classification = $this->general_classification;
        $school->address = $this->address.', '.$this->barangay_district.', '.$this->city_municipality.', '.$this->province_state.', '.$this->country;
        $school->barangay_district = $this->barangay_district;
        $school->city_municipality = $this->city_municipality;
        $school->province_state = $this->province_state;
        $school->country = $this->country;
        $school->postal_code = $this->postal_code;
        $school->contact_person = $this->contact_person;
        $school->position = $this->position;
        $school->mobile_no = $this->mobile_no;
        $school->landline_no = $this->landline_no;
        $school->fax_no = $this->fax_no;
        $school->save();

        return $school;
    }
}
