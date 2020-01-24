<?php

namespace Modules\TermPeriodEvent\Actions;

use Lorisleiva\Actions\Action;
use Modules\TermPeriodEvent\Entities\TermPeriodEvent;

class GetTermPeriodEventDetail extends Action
{
    /**
     * Determine if the user is authorized to make this action.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('get-term-period-event-detail');
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
     * @return mixed
     */
    public function handle()
    {
        // Execute the action.
        return TermPeriodEvent::find($this->termperiodevent);
    }
}
