<?php

namespace Modules\Role\Actions;

use Lorisleiva\Actions\Action;

class ViewRole extends Action
{
    public function authorize()
    {
        return true;
    }

    public function handle($role)
    {
        return view('role::view')->with('id', $role);
    }
}
