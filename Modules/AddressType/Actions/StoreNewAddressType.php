<?php

namespace Modules\AddressType\Actions;

use Lorisleiva\Actions\Action;
use Modules\AddressType\Entities\AddressType;

class StoreNewAddressType extends Action
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
        return [
            'name' => 'required'
        ];
    }

    /**
     * Execute the action and return a result.
     *
     * @return mixed
     */
    public function handle()
    {
        // Execute the action.
        $addresstype = new AddressType();
        $addresstype->name = $this->name;
        $addresstype->description = $this->description;
        $addresstype->save();

        return $addresstype;
    }
}
