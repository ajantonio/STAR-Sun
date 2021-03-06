<?php 

namespace Modules\ParentalMaritalStatus\Actions;

use Lorisleiva\Actions\Action;
use Modules\ParentalMaritalStatus\Entities\ParentalMaritalStatus;

class GetAllParentalMaritalStatuses extends Action
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
        return ParentalMaritalStatus::orderBy('name')->get();
    }
}