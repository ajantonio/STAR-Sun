<?php

namespace Modules\TermCycle\Actions;

use Lorisleiva\Actions\Action;
use Modules\TermCycle\Entities\TermCycle;

class FindTermCycle extends Action
{
    /**
     * Determine if the user is authorized to make this action.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('find-term-cycle');
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
    public function handle(TermCycle $termcycle)
    {
        // Execute the action.
        return $termcycle;
    }
}
