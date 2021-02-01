<?php

namespace Modules\Campus\Actions;

use Lorisleiva\Actions\Action;
use Modules\Campus\Entities\Campus;
use Modules\System\Entities\DatatableBuilder;

class DataTableOfCampus extends Action
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
            return datatables()->of(Campus::query())
                ->editColumn('action', function ($campus) {
                    return view('campus::components.actions', compact(['campus']));
                })
                ->toJson();
        }

        $builder->addColumn(['data'=>'campus_code']);
        $builder->addColumn(['data'=>'name']);
        $builder->addColumn(['data'=>'description']);
        $builder->addColumn(['data'=>'city_municipality']);
        $builder->addColumn(['data'=>'province_state']);
        
        $builder->addActionColumn();
        $builder->setTableId('campuss');

        return view('campus::index', compact('builder'));
    }
}
