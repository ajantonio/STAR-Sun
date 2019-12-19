<?php

namespace Modules\Test\Actions;

use Lorisleiva\Actions\Action;
use Modules\Test\Entities\Test;
use Modules\System\Entities\DatatableBuilder;

class DataTableOfTest extends Action
{
    /**
     * Determine if the user is authorized to make this action.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('view-test');
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
            return datatables()->of(Test::query())
                ->editColumn('action', function ($test) {
                    return view('test::components.actions', compact(['test']));
                })
                ->toJson();
        }

        $builder->addColumn(['data'=>'id']);
        $builder->addActionColumn();
        $builder->setTableId('tests');

        return view('test::index', compact('builder'));
    }
}
