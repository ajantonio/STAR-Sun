<?php

namespace Modules\TermEvent\Actions;

use Lorisleiva\Actions\Action;
use Modules\TermEvent\Entities\TermEvent;
use Modules\System\Entities\DatatableBuilder;

class DataTableOfTermEvent extends Action
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
            return datatables()->of(TermEvent::query())
                ->editColumn('action', function ($termevent) {
                    return view('termevent::components.actions', compact(['termevent']));
                })
                ->toJson();
        }

//        $builder->addColumn(['data'=>'id']);
        $builder->addColumn(['data'=>'name']);
        $builder->addColumn(['data'=>'description']);
        $builder->addActionColumn();
        $builder->setTableId('termevents');

        return view('termevent::index', compact('builder'));
    }
}
