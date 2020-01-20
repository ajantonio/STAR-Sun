<?php

namespace Modules\TermEvent\Actions;

use Lorisleiva\Actions\Action;
use Modules\TermEvent\Entities\TermEvent;

class DeleteTermEvent extends Action
{
    /**
     * Determine if the user is authorized to make this action.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('delete-term-event');
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
        $termevent->delete();
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
