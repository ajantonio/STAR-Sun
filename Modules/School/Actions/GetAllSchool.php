<?php

namespace Modules\School\Actions;

use Lorisleiva\Actions\Action;
use Modules\School\Entities\School;

class GetAllSchool extends Action
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
     * Execute the action and return a result.
     *
     * @return mixed
     */
    public function handle()
    {
        return School::orderBy('name')->get();
    }
}
