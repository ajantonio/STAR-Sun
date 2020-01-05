<?php 

namespace Modules\Attribute\Actions;

use Lorisleiva\Actions\Action;
use Modules\Attribute\Entities\Attribute;

class GetAllAttributes extends Action
{
    /**
     * Determine if the user is authorized to make this action.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('view-any-attribute');
    }

    /**
     * Execute the action and return a result.
     *
     * @return mixed
     */
    public function handle()
    {
        return Attribute::orderBy('domain, key_value_name')->get();
    }
}