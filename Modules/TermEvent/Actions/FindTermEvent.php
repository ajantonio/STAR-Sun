<?php

namespace Modules\TermEvent\Actions;

use Lorisleiva\Actions\Action;
use Modules\TermEvent\Entities\TermEvent;

class FindTermEvent extends Action
{
    /**
     * Determine if the user is authorized to make this action.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('find-term-event');
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
    public function handle(TermEvent $termevent)
    {
        // Execute the action.
        return $termevent;
    }
}
