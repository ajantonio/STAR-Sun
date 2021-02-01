<?php

namespace Modules\Role\Actions;

use Lorisleiva\Actions\Action;
use Modules\Role\Entities\Role;

class DeleteRole extends Action
{
    public function authorize()
    {
        return true;
    }

    public function handle(Role $role)
    {
        $role->delete();
        $role->forgetCachedPermissions();

        return $role;
    }
}
