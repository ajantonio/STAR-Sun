<?php

namespace Modules\Period\Actions;

use Lorisleiva\Actions\Action;
use Modules\Period\Entities\Period;
use Modules\System\Entities\DatatableBuilder;

class DataTableOfPeriod extends Action
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
            return datatables()->of(Period::query())
                ->editColumn('action', function ($period) {
                    return view('period::components.actions', compact(['period']));
                })
                ->toJson();
        }

//        $builder->addColumn(['data'=>'id']);
        $builder->addColumn(['data'=>'name']);
        $builder->addColumn(['data'=>'description']);

        $builder->addActionColumn();
        $builder->setTableId('periods');

        return view('period::index', compact('builder'));
    }
}
