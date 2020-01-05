<?php 

namespace Modules\FamilyRelationship\Actions;

use Lorisleiva\Actions\Action;
use Modules\FamilyRelationship\Entities\FamilyRelationship;

class GetAllFamilyRelationships extends Action
{
    /**
     * Determine if the user is authorized to make this action.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('view-any-family-relationship');
    }

    /**
     * Execute the action and return a result.
     *
     * @return mixed
     */
    public function handle()
    {
        return FamilyRelationship::orderBy('name')->get();
    }
}