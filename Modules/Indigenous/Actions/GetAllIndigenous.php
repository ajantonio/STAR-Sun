<?php 

namespace Modules\Indigenous\Actions;

use Lorisleiva\Actions\Action;
use Modules\Indigenous\Entities\Indigenous;

class GetAllIndigenous extends Action
{
    /**
     * Determine if the user is authorized to make this action.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('view-any-indigenous');
    }

    /**
     * Execute the action and return a result.
     *
     * @return mixed
     */
    public function handle()
    {
        return Indigenous::orderBy('name')->get();
    }
}