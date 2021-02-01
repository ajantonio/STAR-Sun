<?php

namespace Modules\TermEventDetail\Actions;

use Lorisleiva\Actions\Action;
use Modules\TermEventDetail\Entities\TermEventDetail;
use Modules\System\Entities\DatatableBuilder;
use function foo\func;

class DataTableOfTermEventDetail extends Action
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
            return datatables()->of(TermEventDetail::with(['term', 'term_event'])->get())
                ->editColumn('action', function ($termeventdetail) {
                    return view('termeventdetail::components.actions', compact(['termeventdetail']));
                })
                ->editColumn('term_id', function($termeventdetail){
                    return $termeventdetail->term->term;
                })
                ->editColumn('term_event_id', function($termeventdetail){
                    return $termeventdetail->term_event->name;
                })

                ->toJson();
        }

//        $builder->addColumn(['data'=>'id']);
        $builder->addColumn(['data'=>'term_id', 'title'=>'School Term']);
        $builder->addColumn(['data'=>'term_event_id', 'title'=>'Term Event']);
        $builder->addColumn(['data'=>'datetime_start']);
        $builder->addColumn(['data'=>'datetime_end']);
        $builder->addActionColumn();
        $builder->setTableId('termeventdetails');

        return view('termeventdetail::index', compact('builder'));
    }
}
