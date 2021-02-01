<?php

namespace Modules\ResourceGroup\Actions;

use Lorisleiva\Actions\Action;

class ShowCreateResourceGroupForm extends Action
{
    public function authorize()
    {
        return true;
    }

    public function handle()
    {
        return view('resourcegroup::create');
    }
}
