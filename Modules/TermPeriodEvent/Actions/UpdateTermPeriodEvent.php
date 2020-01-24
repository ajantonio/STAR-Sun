<?php

namespace Modules\TermPeriodEvent\Actions;

use Lorisleiva\Actions\Action;
use Modules\TermPeriodEvent\Entities\TermPeriodEvent;

class UpdateTermPeriodEvent extends Action
{
    /**
     * Determine if the user is authorized to make this action.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('update-term-period-event');
    }

    /**
     * Get the validation rules that apply to the action.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'term_id' => 'required',
            'period_id' => 'required',
            'term_event_id' => 'required',
            'datetime_start' => 'required',
            'datetime_end' => 'required'
        ];
    }

    /**
     * Execute the action and return a result.
     *
     * @return mixed
     */
    public function handle(TermPeriodEvent $termperiodevent)
    {
        // Execute the action.
        $termperiodevent->term_id = $this->term_id;
        $termperiodevent->period_id = $this->period_id;
        $termperiodevent->term_event_id = $this->term_event_id;
        $termperiodevent->datetime_start = date('Y-m-d H:i:s', strtotime($this->datetime_start));
        $termperiodevent->datetime_end = date('Y-m-d H:i:s', strtotime($this->datetime_end));
        $termperiodevent->save();

        return $termperiodevent;
    }
}
