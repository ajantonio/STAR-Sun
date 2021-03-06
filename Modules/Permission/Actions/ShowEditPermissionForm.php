<?php

namespace Modules\Permission\Actions;

use Lorisleiva\Actions\Action;
use Modules\Role\Entities\Role;

class ShowEditPermissionForm extends Action
{

    public function authorize()
    {
        return true;
    }

    public function handle()
    {
        $roles = Role::orderBy('name')->get();
        return view('permission::edit', compact('roles'))->with('id', $this->permission);
    }
}
