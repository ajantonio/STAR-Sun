<?php

namespace Modules\Permission\Actions;

use Lorisleiva\Actions\Action;
use Modules\Role\Entities\Role;

class ShowCreatePermissionForm extends Action
{

    public function authorize()
    {
        return true;
    }

    public function handle()
    {
        $roles = Role::orderBy('name')->get();
        return view('permission::create', compact('roles'));
    }
}
