<?php

namespace Modules\AddressType\Actions;

use Lorisleiva\Actions\Action;
use Modules\AddressType\Entities\AddressType;
use Modules\System\Entities\DatatableBuilder;

class DataTableOfAddressType extends Action
{
    /**
     * Determine if the user is authorized to make this action.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('view-addresstype');
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
            return datatables()->of(AddressType::query())
                ->editColumn('action', function ($addresstype) {
                    return view('addresstype::components.actions', compact(['addresstype']));
                })
                ->toJson();
        }

//        $builder->addColumn(['data'=>'id']);
        $builder->addColumn(['data'=>'name']);
        $builder->addColumn(['data'=>'description']);

        $builder->addActionColumn();
        $builder->setTableId('addresstypes');

        return view('addresstype::index', compact('builder'));
    }
}
