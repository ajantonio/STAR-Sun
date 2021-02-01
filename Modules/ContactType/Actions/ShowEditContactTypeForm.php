<?php

namespace Modules\ContactType\Actions;

use Lorisleiva\Actions\Action;
use Modules\ContactType\Entities\ContactType;

class ShowEditContactTypeForm extends Action
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
        return [];
    }

    /**
     * Execute the action and return a result.
     *
     * @return mixed
     */
    public function handle(ContactType $contacttype)
    {
        // Execute the action.
        return $contacttype;
    }

    public function jsonResponse($result,$request)
    {
        return $result;
    }

    public function htmlResponse($result,$response)
    {
        return view('contacttype::edit')->with('id', $result->id);
    }
}
