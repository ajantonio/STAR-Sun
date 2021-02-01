<?php

namespace Modules\Permission\Actions;

use Lorisleiva\Actions\Action;
use Modules\Permission\Entities\Permission;

class DeletePermission extends Action
{
    public function authorize()
    {
        return true;
    }

    public function handle(Permission $permission)
    {
        $permission->delete();
        $permission->forgetCachedPermissions();

        return $permission;
    }
}
