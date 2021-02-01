<?php

namespace Modules\Attribute\Actions;

use Lorisleiva\Actions\Action;
use Modules\Attribute\Entities\Attribute;
use Modules\System\Entities\DatatableBuilder;

class DataTableOfAttribute extends Action
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
            return datatables()->of(Attribute::query())
                ->editColumn('action', function ($attribute) {
                    return view('attribute::components.actions', compact(['attribute']));
                })
                ->toJson();
        }

        $builder->addColumn(['data'=>'domain']);
        $builder->addColumn(['data'=>'key_value_name']);
        $builder->addColumn(['data'=>'description']);

        $builder->addActionColumn();
        $builder->setTableId('attributes');

        return view('attribute::index', compact('builder'));
    }
}
