<?php

namespace Modules\Role\Actions;

use Illuminate\Validation\Rule;
use Lorisleiva\Actions\Action;

class UpdateRole extends Action
{
    public function authorize()
    {
        return $this->user()->can('update-role');
    }

    public function rules()
    {
        return [
            'name' => 'required|' . Rule::unique('roles')->ignore($this->id)
        ];
    }

    /**
     * Execute the action and return a result.
     *
     * @return mixed
     */
    public function handle()
    {
        // Execute the action.
    }
}
