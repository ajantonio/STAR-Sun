<?php


namespace Modules\ResourceGroup\Actions;


use Modules\ResourceGroup\Entities\ResourceGroup;
use Modules\System\Contracts\ActionInterface;
use Modules\System\Traits\HasActionAttribute;

class GetResourcePermissions implements ActionInterface
{
    use HasActionAttribute;

    public function execute()
    {
        ResourceGroup::ofObjectUUID($this->resource_group)->first();
    }
}