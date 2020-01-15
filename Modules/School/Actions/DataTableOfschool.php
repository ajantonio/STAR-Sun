<?php

namespace Modules\school\Actions;

use Lorisleiva\Actions\Action;
use Modules\school\Entities\school;
use Modules\System\Entities\DatatableBuilder;

class DataTableOfschool extends Action
{
    /**
     * Determine if the user is authorized to make this action.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('view-school');
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
            return datatables()->of(school::query())
                ->editColumn('action', function ($school) {
                    return view('school::components.actions', compact(['school']));
                })
                ->toJson();
        }

        $builder->addColumn(['data'=>'name']);
        $builder->addColumn(['data'=>'school_code']);
        $builder->addColumn(['data'=>'general_classification']);
        $builder->addColumn(['data'=>'address']);
        $builder->addColumn(['data'=>'postal_code']);
        $builder->addColumn(['data'=>'contact_person']);
        $builder->addColumn(['data'=>'position']);
        $builder->addColumn(['data'=>'mobile_no']);
        $builder->addColumn(['data'=>'landline_no']);
        $builder->addColumn(['data'=>'fax_no']);
        $builder->addActionColumn();
        $builder->setTableId('schools');

        return view('school::index', compact('builder'));
    }
}
