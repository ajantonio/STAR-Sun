<?php

namespace Modules\Application\Actions;

use Illuminate\Support\Str;
use Lorisleiva\Actions\Action;
use Modules\Application\Entities\Application;

class StoreNewApplication extends Action
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|unique:applications',
            'url' => 'required'
        ];
    }

    public function handle()
    {
        $application = new Application();
        $application->id = Str::orderedUuid()->toString();
        $application->name = $this->name;
        $application->description = $this->description;
        $application->url = $this->url;
        $application->icon = $this->icon;
        $application->on_dashboard = $this->on_dashboard;
        $application->save();

        return $application;
    }
}
