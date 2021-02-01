<?php


namespace Modules\Generator\Actions;


use Lorisleiva\Actions\Action;

class ShowModuleGeneratorPage extends Action
{
    public function authorize()
    {
        return true;
    }

    public function handle()
    {
        return view('generator::index');
    }
}