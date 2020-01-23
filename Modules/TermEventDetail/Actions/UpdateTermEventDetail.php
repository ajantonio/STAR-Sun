<?php

namespace Modules\TermEventDetail\Actions;

use Carbon\Carbon;
use Lorisleiva\Actions\Action;
use Modules\TermEventDetail\Entities\TermEventDetail;

class UpdateTermEventDetail extends Action
{
    /**
     * Determine if the user is authorized to make this action.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('update-term-event-detail');
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
    public function handle(TermEventDetail $termeventdetail)
    {
        // Execute the action.
        $termeventdetail->term_id = $this->term_id;
        $termeventdetail->term_event_id = $this->term_event_id;
        $termeventdetail->datetime_start = Carbon::parse($this->datetime_start)->format('Y-m-d H:i:s');
        $termeventdetail->datetime_end = Carbon::parse($this->datetime_end)->format('Y-m-d H:i:s');
        $termeventdetail->save();

        return $termeventdetail;
    }
}
