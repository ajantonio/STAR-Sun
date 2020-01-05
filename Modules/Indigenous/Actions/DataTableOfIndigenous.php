<?php

namespace Modules\Indigenous\Actions;

use Lorisleiva\Actions\Action;
use Modules\Indigenous\Entities\Indigenous;
use Modules\System\Entities\DatatableBuilder;

class DataTableOfIndigenous extends Action
{
    /**
     * Determine if the user is authorized to make this action.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('view-indigenous');
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
            return datatables()->of(Indigenous::query())
                ->editColumn('action', function ($indigenous) {
                    return view('indigenous::components.actions', compact(['indigenous']));
                })
                ->toJson();
        }

        $builder->addColumn(['data'=>'name']);
        $builder->addColumn(['data'=>'description']);
        
        $builder->addActionColumn();
        $builder->setTableId('indigenouss');

        return view('indigenous::index', compact('builder'));
    }
}
