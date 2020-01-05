<?php


namespace Modules\Passport\Actions;


use Lorisleiva\Actions\Action;

class ViewPassportClientPage extends Action
{
    public function authorize()
    {
        return $this->user()->can('access-passport-client');
    }

    public function handle()
    {
        return view('passport::index');
    }
}