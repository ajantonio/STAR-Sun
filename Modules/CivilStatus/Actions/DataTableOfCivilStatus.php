<?php

namespace Modules\CivilStatus\Actions;

use Lorisleiva\Actions\Action;
use Modules\CivilStatus\Entities\CivilStatus;
use Modules\System\Entities\DatatableBuilder;

class DataTableOfCivilStatus extends Action
{
    /**
     * Determine if the user is authorized to make this action.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('view-civilstatus');
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
            return datatables()->of(CivilStatus::query())
                ->editColumn('action', function ($civilstatus) {
                    return view('civilstatus::components.actions', compact(['civilstatus']));
                })
                ->toJson();
        }

        $builder->addColumn(['data'=>'name']);
        $builder->addColumn(['data'=>'description']);
//        $builder->addColumn(['data'=>'id']);
        $builder->addActionColumn();
        $builder->setTableId('civilstatuss');

        return view('civilstatus::index', compact('builder'));
    }
}
