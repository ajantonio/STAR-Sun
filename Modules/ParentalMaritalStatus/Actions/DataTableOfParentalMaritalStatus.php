<?php

namespace Modules\ParentalMaritalStatus\Actions;

use Lorisleiva\Actions\Action;
use Modules\ParentalMaritalStatus\Entities\ParentalMaritalStatus;
use Modules\System\Entities\DatatableBuilder;

class DataTableOfParentalMaritalStatus extends Action
{
    /**
     * Determine if the user is authorized to make this action.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('view-parentalmaritalstatus');
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
            return datatables()->of(ParentalMaritalStatus::query())
                ->editColumn('action', function ($parentalmaritalstatus) {
                    return view('parentalmaritalstatus::components.actions', compact(['parentalmaritalstatus']));
                })
                ->toJson();
        }

        $builder->addColumn(['data'=>'name']);
        $builder->addColumn(['data'=>'description']);
        
        $builder->addActionColumn();
        $builder->setTableId('parentalmaritalstatuss');

        return view('parentalmaritalstatus::index', compact('builder'));
    }
}
