<?php

namespace Modules\DayOfWeek\Actions;

use Lorisleiva\Actions\Action;
use Modules\DayOfWeek\Entities\DayOfWeek;
use Modules\System\Entities\DatatableBuilder;

class DataTableOfDayOfWeek extends Action
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
            return datatables()->of(DayOfWeek::query())
                ->editColumn('action', function ($dayofweek) {
                    return view('dayofweek::components.actions', compact(['dayofweek']));
                })
                ->toJson();
        }

//        $builder->addColumn(['data'=>'id']);
        $builder->addColumn(['data'=>'day_string']);

        $builder->addActionColumn();
        $builder->setTableId('dayofweeks');

        return view('dayofweek::index', compact('builder'));
    }
}
