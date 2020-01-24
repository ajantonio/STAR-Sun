<?php

namespace Modules\TermPeriodEvent\Actions;

use Lorisleiva\Actions\Action;
use Modules\TermPeriodEvent\Entities\TermPeriodEvent;

class DeleteTermPeriodEvent extends Action
{
    /**
     * Determine if the user is authorized to make this action.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('delete-term-period-event');
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
    public function handle(TermPeriodEvent $termperiodevent)
    {
        // Execute the action.
        $termperiodevent->delete();

        return $termperiodevent;
    }

    public function jsonResponse($result, $request)
    {
        return $result;
    }

    public function htmlResponse($results, $request)
    {
        return redirect()->back();
    }
}
