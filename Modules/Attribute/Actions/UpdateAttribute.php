<?php

namespace Modules\Attribute\Actions;

use Lorisleiva\Actions\Action;
use Modules\Attribute\Entities\Attribute;

class UpdateAttribute extends Action
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
        $attribute->domain = $this->domain;
        $attribute->key_value_name = $this->key_value_name;
        $attribute->description = $this->description;
        $attribute->save();

        return $attribute;
    }
}
