<?php

namespace Modules\AddressType\Actions;

use Lorisleiva\Actions\Action;
use Modules\AddressType\Entities\AddressType;

class DeleteAddressType extends Action
{
    /**
     * Determine if the user is authorized to make this action.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('delete-address-type');
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
     * @param AddressType $addresstype
     * @return mixed
     * @throws \Exception
     */
    public function handle(AddressType $addresstype)
    {
        // Execute the action.
        $addresstype->delete();

        return $addresstype;
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
