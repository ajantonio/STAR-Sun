<?php

namespace Modules\Role\Actions;

use Lorisleiva\Actions\Action;
use Modules\Role\Entities\Role;

class FindRole extends Action
{
    public function handle(Role $role)
    {
        return $role;
    }
}
