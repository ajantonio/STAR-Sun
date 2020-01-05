<?php

namespace Modules\FamilyRelationship\Actions;

use Lorisleiva\Actions\Action;
use Modules\FamilyRelationship\Entities\FamilyRelationship;
use Modules\System\Entities\DatatableBuilder;

class DataTableOfFamilyRelationship extends Action
{
    /**
     * Determine if the user is authorized to make this action.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('view-familyrelationship');
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
     * @param DatatableBuilder $builder
     * @return mixed
     * @throws \Exception
     */
    public function handle(DatatableBuilder $builder)
    {
        if (request()->ajax()) {
            return datatables()->of(FamilyRelationship::query())
                ->editColumn('action', function ($familyrelationship) {
                    return view('familyrelationship::components.actions', compact(['familyrelationship']));
                })
                ->toJson();
        }

        $builder->addColumn(['data'=>'name']);
        $builder->addColumn(['data'=>'description']);

        $builder->addActionColumn();
        $builder->setTableId('familyrelationships');

        return view('familyrelationship::index', compact('builder'));
    }
}
