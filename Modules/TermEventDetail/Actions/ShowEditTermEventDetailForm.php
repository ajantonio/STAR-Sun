<?php

namespace Modules\TermEventDetail\Actions;

use Lorisleiva\Actions\Action;
use Modules\TermEventDetail\Entities\TermEventDetail;

class ShowEditTermEventDetailForm extends Action
{
    /**
     * Determine if the user is authorized to make this action.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('show-edit-term-event-detail-form');
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
    public function handle(TermEventDetail $termeventdetail)
    {
        // Execute the action.
        return $termeventdetail;
    }

    public function jsonResponse($result, $request)
    {
        return $result;
    }

    public function htmlResponse($result, $response)
    {
        return view('termeventdetail::edit')->with('id', $result->id);
    }
}
