<?php

namespace Modules\ContactType\Actions;

use Lorisleiva\Actions\Action;
use Modules\ContactType\Entities\ContactType;

class GetAllContactType extends Action
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
    public function handle()
    {
        // Execute the action.
        return ContactType::orderBy('name')->get();
    }
}
