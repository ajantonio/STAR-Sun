<?php

namespace Modules\FamilyRelationship\Actions;

use Lorisleiva\Actions\Action;
use Modules\FamilyRelationship\Entities\FamilyRelationship;

class GetFamilyRelationshipDetails extends Action
{
     /**
     * Determine if the user is authorized to make this action.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('show-family-relationship');
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
        return FamilyRelationship::find($this->familyrelationship);
    }    
}
