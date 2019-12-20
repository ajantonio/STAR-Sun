<?php


namespace Modules\Application\Actions;


use Lorisleiva\Actions\Action;
use Modules\Application\Entities\Application;

class ShowApplicationDashboardPage extends Action
{
    public function handle()
    {
        $apps = Application::where('id', '!=', config('app.id'))->get();
        return view('application::app-dashboard', compact('apps'));
    }
}