<?php

namespace Modules\ContactType\Actions;

use Lorisleiva\Actions\Action;
use Modules\ContactType\Entities\ContactType;
use Modules\System\Entities\DatatableBuilder;

class DataTableOfContactType extends Action
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
            return datatables()->of(ContactType::query())
                ->editColumn('action', function ($contacttype) {
                    return view('contacttype::components.actions', compact(['contacttype']));
                })
                ->toJson();
        }

        $builder->addColumn(['data'=>'name']);
        $builder->addColumn(['data'=>'description']);
        $builder->addActionColumn();
        $builder->setTableId('contacttypes');

        return view('contacttype::index', compact('builder'));
    }
}
