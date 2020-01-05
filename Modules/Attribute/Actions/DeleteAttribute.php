<?php

namespace Modules\Attribute\Actions;

use Lorisleiva\Actions\Action;
use Modules\Attribute\Entities\Attribute;

class DeleteAttribute extends Action
{
    /**
     * Determine if the user is authorized to make this action.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('delete-attribute');
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
        $attribute->delete();

        return $attribute;
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
