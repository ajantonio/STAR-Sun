<?php

namespace Modules\Role\Actions;

use Illuminate\Validation\Rule;
use Lorisleiva\Actions\Action;
use Modules\Permission\Entities\Permission;
use Modules\Role\Entities\Role;

class UpdateRole extends Action
{
    public function authorize()
    {
        return true;
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
        $role->load('permissions');

        $old_permissions = $role->permissions;
        $new_permissions = Permission::whereIn('id', $this->permissions)->get()->pluck('name');

        $role->name = $this->name;
        $role->description = $this->description;
        $role->save();

        $role->permissions()->sync($this->permissions);
        $role->forgetCachedPermissions();

        //$role->syncPermissions($new_permissions);

        $log_data = [
            'old' => $old_permissions->pluck('name'),
            'new' => $new_permissions
        ];

        activity()->withProperties($log_data)
            ->performedOn($role)
            ->log('Update role permissions');


        return $role;
    }
}
