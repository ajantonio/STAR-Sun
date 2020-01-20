<?php

namespace Modules\TermCycle\Actions;

use Lorisleiva\Actions\Action;
use Modules\TermCycle\Entities\TermCycle;
use Modules\System\Entities\DatatableBuilder;

class DataTableOfTermCycle extends Action
{
    /**
     * Determine if the user is authorized to make this action.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('view-termcycle');
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
            return datatables()->of(TermCycle::query())
                ->editColumn('action', function ($termcycle) {
                    return view('termcycle::components.actions', compact(['termcycle']));
                })
                ->toJson();
        }

//        $builder->addColumn(['data'=>'id']);
        $builder->addColumn(['data'=>'name']);
        $builder->addColumn(['data'=>'description']);
        $builder->addActionColumn();
        $builder->setTableId('termcycles');

        return view('termcycle::index', compact('builder'));
    }
}
