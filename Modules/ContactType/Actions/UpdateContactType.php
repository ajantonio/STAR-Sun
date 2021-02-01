<?php

namespace Modules\ContactType\Actions;

use Lorisleiva\Actions\Action;
use Modules\ContactType\Entities\ContactType;

class UpdateContactType extends Action
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
        $contacttype->name = $this->name;
        $contacttype->description = $this->description;
        $contacttype->save();

        return $contacttype;
    }
}
