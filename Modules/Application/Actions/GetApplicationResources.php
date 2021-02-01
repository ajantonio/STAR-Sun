<?php

namespace Modules\Application\Actions;

use Lorisleiva\Actions\Action;
use Modules\ResourceGroup\Entities\ResourceGroup;

class GetApplicationResources extends Action
{
    public function authorize()
    {
        return true;
    }
    public function handle()
    {
        return ResourceGroup::with(['permissions'])->where('application_id', $this->application)->orderBy('name')->get();
    }
}
