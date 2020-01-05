<?php

namespace Modules\FamilyRelationship\Actions;

use Lorisleiva\Actions\Action;
use Modules\FamilyRelationship\Entities\FamilyRelationship;

class StoreNewFamilyRelationship extends Action
{
    /**
     * Determine if the user is authorized to make this action.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('store-new-family-relationship');
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
        $familyrelationship = new FamilyRelationship();
        $familyrelationship->name = $this->name;
        $familyrelationship->description = $this->description;
        $familyrelationship->save();

        return $familyrelationship;
    }
}
