<?php

namespace Modules\AddressType\Actions;

use Lorisleiva\Actions\Action;
use Modules\AddressType\Entities\AddressType;

class FindAddressType extends Action
{
    /**
     * Determine if the user is authorized to make this action.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('find-address-type');
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
}
