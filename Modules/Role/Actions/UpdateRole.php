<?php

namespace Modules\Role\Actions;

use Illuminate\Validation\Rule;
use Lorisleiva\Actions\Action;
use Modules\Role\Entities\Role;

class UpdateRole extends Action
{
    public function authorize()
    {
        return $this->user()->can('update-role');
    }

    public function rules()
    {
        return [
            'name' => 'required|' . Rule::unique('roles')->ignore($this->role)
        ];
    }

    /**
     * Execute the action and return a result.
     *
     * @param Role $role
     * @return mixed
     */
    public function handle(Role $role)
    {
        $role->name = $this->name;
        $role->description = $this->description;
        $role->save();
        $role->permissions()->sync($this->permissions);
        $role->forgetCachedPermissions();

        return $role;
    }
}
