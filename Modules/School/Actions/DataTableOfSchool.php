<?php

namespace Modules\School\Actions;

use Lorisleiva\Actions\Action;
use Modules\school\Entities\school;
use Modules\System\Entities\DatatableBuilder;

class DataTableOfSchool extends Action
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
        $builder->addColumn(['data'=>'general_classification']);
        $builder->addColumn(['data'=>'contact_person']);
        $builder->addColumn(['data'=>'mobile_no']);
        $builder->addActionColumn();
        $builder->setTableId('schools');

        return view('school::index', compact('builder'));
    }
}
