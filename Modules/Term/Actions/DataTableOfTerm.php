<?php

namespace Modules\Term\Actions;

use Lorisleiva\Actions\Action;
use Modules\Term\Entities\Term;
use Modules\System\Entities\DatatableBuilder;
use function foo\func;

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
            return datatables()->of(Term::with('campus')->get())
                ->editColumn('action', function ($term) {
                    return view('term::components.actions', compact(['term']));
                })
                ->editColumn('campus_id', function ($term){
                        return $term->campus->name;
                })
                ->addColumn('school_year_term', function($term){
                    return $term->school_year . " - " . $term->term;
                })

                ->toJson();
        }

        $builder->addColumn(['data'=>'school_year_term']);
        $builder->addColumn(['data'=>'campus_id', 'title'=>'Campus Name']);
        // $builder->addColumn(['data'=>'school_year']);
        // $builder->addColumn(['data'=>'term']);
        $builder->addColumn(['data'=>'is_ongoing']);
        $builder->addActionColumn();
        $builder->setTableId('terms');

        $builder->orderBy([0, 1], 'asc');

        return view('term::index', compact('builder'));
    }
}
