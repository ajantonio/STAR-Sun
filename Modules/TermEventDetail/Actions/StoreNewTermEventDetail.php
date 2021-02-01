<?php

namespace Modules\TermEventDetail\Actions;

use Lorisleiva\Actions\Action;
use Modules\TermEventDetail\Entities\TermEventDetail;

class StoreNewTermEventDetail extends Action
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
    public function handle()
    {
        // Execute the action.
        $termeventdetail = new TermEventDetail();
        $termeventdetail->term_id = $this->term_id;
        $termeventdetail->term_event_id = $this->term_event_id;
        $termeventdetail->datetime_start = date('Y-m-d H:i:s', strtotime($this->datetime_start));
        $termeventdetail->datetime_end = date('Y-m-d H:i:s', strtotime($this->datetime_end));
        $termeventdetail->save();

        return $termeventdetail;
    }
}
