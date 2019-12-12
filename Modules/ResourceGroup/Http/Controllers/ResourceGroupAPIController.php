<?php


namespace Modules\ResourceGroup\Http\Controllers;


use Illuminate\Routing\Controller;
use Modules\Application\Entities\Application;
use Modules\ResourceGroup\Actions\GetApplicationResource;
use Modules\ResourceGroup\Entities\ResourceGroup;

class ResourceGroupAPIController extends Controller
{

    public function index()
    {
        return ResourceGroup::with('application')->orderBy('name')->get();
    }
}