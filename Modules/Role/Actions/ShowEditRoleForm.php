<?php

namespace Modules\Role\Actions;

use Lorisleiva\Actions\Action;

class ShowEditRoleForm extends Action
{
    public function authorize()
    {
        return $this->user()->can('edit-role');
    }

    public function handle($role)
    {
        return view('role::edit')->with('id', $role);
    }
}
