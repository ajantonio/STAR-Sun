<?php


namespace Modules\Application\Actions;


use Lorisleiva\Actions\Action;
use Modules\Application\Entities\Application;

class ShowApplicationDashboardPage extends Action
{
    public function handle()
    {
        $apps = Application::where('id', '!=', config('app.id'))
            ->where('on_dashboard', 1)->orderBy('name')->get();

        if (!auth()->user()->hasRole('Super Admin')) {
            //get all user permissions via roles since we are not giving direct permission
            $all_permissions = auth()->user()->getPermissionsViaRoles();

            $apps = $apps->filter(function ($app, $index) use ($all_permissions) {
                return $all_permissions->where('application_id', '=', $app->id)->count();
            });
        }

        return view('application::app-dashboard', compact('apps'));
    }
}