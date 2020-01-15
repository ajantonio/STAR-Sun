<?php

namespace Modules\ContactType\Actions;

use Adldap\Models\Contact;
use Lorisleiva\Actions\Action;

class ViewContactType extends Action
{
    /**
     * Determine if the user is authorized to make this action.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('view-contact-type');
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
}
