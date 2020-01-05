<?php

namespace Modules\Country\Actions;

use Lorisleiva\Actions\Action;
use Modules\Country\Entities\Country;
use Modules\System\Entities\DatatableBuilder;

class DataTableOfCountry extends Action
{
    /**
     * Determine if the user is authorized to make this action.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('view-country');
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
            return datatables()->of(Country::query())
                ->editColumn('action', function ($country) {
                    return view('country::components.actions', compact(['country']));
                })
                ->toJson();
        }

        $builder->addColumn(['data'=>'name']);
        $builder->addColumn(['data'=>'description']);
        $builder->addColumn(['data'=>'nationality']);

        $builder->addActionColumn();
        $builder->setTableId('countrys');

        return view('country::index', compact('builder'));
    }
}
