<?php

namespace Modules\CivilStatus\Actions;

use Lorisleiva\Actions\Action;
use Modules\CivilStatus\Entities\CivilStatus;

class ViewCivilStatus extends Action
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
    public function handle(CivilStatus $civilstatus)
    {
        // Execute the action.
        return $civilstatus;
    }
}
