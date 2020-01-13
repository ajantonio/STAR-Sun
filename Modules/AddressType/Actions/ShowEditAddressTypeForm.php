<?php

namespace Modules\AddressType\Actions;

use Lorisleiva\Actions\Action;
use Modules\AddressType\Entities\AddressType;

class ShowEditAddressTypeForm extends Action
{
    /**
     * Determine if the user is authorized to make this action.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('show-edit-address-type-form');
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
    public function handle(AddressType $addresstype)
    {
        // Execute the action.
        return $addresstype;
    }

    public function jsonResponse($result, $request)
    {
        return $result;
    }

    public function htmlResponse($result, $response)
    {
        return view('addresstype::edit')->with('id', $result->id);
    }
}
