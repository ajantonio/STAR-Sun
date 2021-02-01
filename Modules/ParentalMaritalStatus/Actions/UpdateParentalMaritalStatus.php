<?php

namespace Modules\ParentalMaritalStatus\Actions;

use Lorisleiva\Actions\Action;
use Modules\ParentalMaritalStatus\Entities\ParentalMaritalStatus;

class UpdateParentalMaritalStatus extends Action
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
    public function handle(ParentalMaritalStatus $parentalmaritalstatus)
    {
        $parentalmaritalstatus->name = $this->name;
        $parentalmaritalstatus->description = $this->description;
        $parentalmaritalstatus->save();

        return $parentalmaritalstatus;
    }
}
