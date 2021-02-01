<?php

namespace Modules\Attribute\Actions;

use Lorisleiva\Actions\Action;
use Modules\Attribute\Entities\Attribute;

class ShowEditAttributeForm extends Action
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
    public function handle(Attribute $attribute)
    {
        return $attribute;
    }

    public function jsonResponse($result, $request)
    {
        return $result;
    }

    public function htmlResponse($result, $response)
    {
        return view('attribute::edit')->with('id', $result->id);
    }
}
