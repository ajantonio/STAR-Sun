<?php

namespace Modules\EducationLevel\Actions;

use Lorisleiva\Actions\Action;
use Modules\EducationLevel\Entities\EducationLevel;
use Modules\System\Entities\DatatableBuilder;

class DataTableOfEducationLevel extends Action
{
    /**
     * Determine if the user is authorized to make this action.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('view-educationlevel');
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
            return datatables()->of(EducationLevel::query())
                ->editColumn('action', function ($educationlevel) {
                    return view('educationlevel::components.actions', compact(['educationlevel']));
                })
                ->toJson();
        }

        $builder->addColumn(['data'=>'name']);
        $builder->addColumn(['data'=>'description']);
        $builder->addActionColumn();
        $builder->setTableId('educationlevels');

        return view('educationlevel::index', compact('builder'));
    }
}
