<?php

namespace Modules\TermPeriodEvent\Actions;

use Lorisleiva\Actions\Action;
use Modules\TermPeriodEvent\Entities\TermPeriodEvent;
use Modules\System\Entities\DatatableBuilder;

class DataTableOfTermPeriodEvent extends Action
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
            return datatables()->of(TermPeriodEvent::with(['term', 'period', 'term_event'])->get())
                ->editColumn('action', function ($termperiodevent) {
                    return view('termperiodevent::components.actions', compact(['termperiodevent']));
                })
                ->editColumn('term_id', function ($termperiodevent){
                    return $termperiodevent->term->term;
                })
                ->editColumn('period_id', function ($termperiodevent){
                    return $termperiodevent->period->name;
                })
                ->editColumn('term_event_id', function ($termperiodevent){
                    return $termperiodevent->term_event->name;
                })
                ->toJson();
        }

//        $builder->addColumn(['data'=>'id']);
        $builder->addColumn(['data'=>'term_id', 'title'=>'School Term']);
        $builder->addColumn(['data'=>'period_id', 'title'=>'Period']);
        $builder->addColumn(['data'=>'term_event_id', 'title'=>'Term Event']);
        $builder->addColumn(['data'=>'datetime_start']);
        $builder->addColumn(['data'=>'datetime_end']);
        $builder->addActionColumn();
        $builder->setTableId('termperiodevents');

        return view('termperiodevent::index', compact('builder'));
    }
}
