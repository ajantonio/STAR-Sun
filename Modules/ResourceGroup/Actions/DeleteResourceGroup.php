<?php

namespace Modules\ResourceGroup\Actions;

use Lorisleiva\Actions\Action;
use Modules\ResourceGroup\Entities\ResourceGroup;

class DeleteResourceGroup extends Action
{
    public function authorize()
    {
        return true;
    }

    public function handle(ResourceGroup $resourcegroup)
    {
        $resourcegroup->delete();

        return $resourcegroup;
    }
}
