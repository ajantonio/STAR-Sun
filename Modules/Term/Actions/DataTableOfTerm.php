<?php

namespace Modules\Term\Actions;

use Lorisleiva\Actions\Action;
use Modules\Term\Entities\Term;
use Modules\System\Entities\DatatableBuilder;

class DataTableOfTerm extends Action
{
    /**
     * Determine if the user is authorized to make this action.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('view-term');
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
            return datatables()->of(Term::query())
                ->editColumn('action', function ($term) {
                    return view('term::components.actions', compact(['term']));
                })
                ->toJson();
        }

//        $builder->addColumn(['data'=>'id']);
//        $builder->addColumn(['data'=>'campus_id']);
//        $builder->addColumn(['data'=>'term_cycle_id']);
        $builder->addColumn(['data'=>'school_year']);
        $builder->addColumn(['data'=>'term']);
        $builder->addColumn(['data'=>'is_ongoing']);
        $builder->addActionColumn();
        $builder->setTableId('terms');

        return view('term::index', compact('builder'));
    }
}
