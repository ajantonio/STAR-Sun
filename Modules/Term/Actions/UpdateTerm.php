<?php

namespace Modules\Term\Actions;

use Lorisleiva\Actions\Action;
use Modules\Term\Entities\Term;
use Modules\TermEventDetail\Entities\TermEventDetail;
use Modules\TermPeriodEvent\Entities\TermPeriodEvent;

class UpdateTerm extends Action
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
        return [
            'campus_id' => 'required',
            'term_cycle_id' => 'required',
            'school_year' => 'required',
            'term' => 'required',
            'is_ongoing' => 'required'
        ];
    }

    /**
     * Execute the action and return a result.
     *
     * @return mixed
     */
    public function handle(Term $term)
    {
        // Execute the action.
        $term->campus_id = $this->campus_id;
        $term->term_cycle_id = $this->term_cycle_id;
        $term->school_year = $this->school_year;
        $term->term = $this->term;
        $term->is_ongoing = $this->is_ongoing;

        $term->event_details()->delete();
        foreach ($this->term_event_details as $term_event_detail)
        {
            /*$data = [
                "term_id" => $term->id,
                "term_event_id" => $term_event_detail['term_event'],
                "datetime_start" => date('Y-m-d H:i:s', strtotime($term_event_detail['date_time_start'])),
                "datetime_end" => date('Y-m-d H:i:s', strtotime($term_event_detail['date_time_end']))
            ];

            $term->event_details()->save(new TermEventDetail($data));*/

            $term_event_detail['term_event_id'] = $term_event_detail['term_event_id'];
            $term_event_detail['datetime_start'] = date('Y-m-d H:i:s', strtotime($term_event_detail['datetime_start']));
            $term_event_detail['datetime_end'] = date('Y-m-d H:i:s', strtotime($term_event_detail['datetime_end']));

            $term->event_details()->save(new TermEventDetail($term_event_detail));
        }

        $term->period_events()->delete();
        foreach ($this->term_period_events as $term_period_event)
        {
            /*$second_data = [
                "term_id" => $term->id,
                "period_id" => $term_period_event['period'],
                "term_event_id" => $term_period_event['term_event'],
                "datetime_start" => date('Y-m-d H:i:s', strtotime($term_period_event['date_time_start'])),
                "datetime_end" => date('Y-m-d H:i:s', strtotime($term_period_event['date_time_end']))
            ];

            $term->period_events()->save(new TermPeriodEvent($second_data));*/

            $term_period_event['period_id'] = $term_period_event['period_id'];
            $term_period_event['term_event_id'] = $term_period_event['term_event_id'];
            $term_period_event['datetime_start'] = date('Y-m-d H:i:s', strtotime($term_period_event['datetime_start']));
            $term_period_event['datetime_end'] = date('Y-m-d H:i:s', strtotime($term_period_event['datetime_end']));

            $term->period_events()->save(new TermPeriodEvent($term_period_event));
        }

        // return $term;
        $term->save();
    }
}
