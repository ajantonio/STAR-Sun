<?php

namespace Modules\Term\Actions;

use Illuminate\Support\Str;
use Lorisleiva\Actions\Action;
use Modules\Term\Entities\Term;
use Modules\TermEventDetail\Entities\TermEventDetail;
use Modules\TermPeriodEvent\Entities\TermPeriodEvent;

class StoreNewTerm extends Action
{
    /**
     * Determine if the user is authorized to make this action.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('store-new-term');
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
    public function handle()
    {
        // Execute the action.
        $term = new Term();
        $term->id = Str::uuid()->toString();
        $term->campus_id = $this->campus_id;
        $term->term_cycle_id = $this->term_cycle_id;
        $term->school_year = $this->school_year;
        $term->term = $this->term;
        $term->is_ongoing = $this->is_ongoing;
        $term->save();

        foreach ($this->term_event_details as $term_event_detail)
        {
            $data = [
                "term_id" => $term->id,
                "term_event_id" => $term_event_detail['term_event_id'],
                "datetime_start" => date('Y-m-d H:i:s', strtotime($term_event_detail['datetime_start'])),
                "datetime_end" => date('Y-m-d H:i:s', strtotime($term_event_detail['datetime_end']))
            ];

            $term->event_details()->save(new TermEventDetail($data));
        }

        foreach ($this->term_period_events as $term_period_event)
        {
            $second_data = [
                "term_id" => $term->id,
                "period_id" => $term_period_event['period_id'],
                "term_event_id" => $term_period_event['term_event_id'],
                "datetime_start" => date('Y-m-d H:i:s', strtotime($term_period_event['datetime_start'])),
                "datetime_end" => date('Y-m-d H:i:s', strtotime($term_period_event['datetime_end']))
            ];

            $term->period_events()->save(new TermPeriodEvent($second_data));
        }

        return $term;
    }
}
