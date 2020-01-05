<?php 

namespace Modules\AccountType\Actions;

use Lorisleiva\Actions\Action;
use Modules\Religion\Entities\Religion;

class GetAllAccountTypes extends Action
{
    /**
     * Determine if the user is authorized to make this action.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('view-any-religion');
    }

    /**
     * Execute the action and return a result.
     *
     * @return mixed
     */
    public function handle()
    {
        return Religion::orderBy('name')->get();
    }
}