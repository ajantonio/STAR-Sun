<?php


namespace Modules\AuditLog\Actions;


use Lorisleiva\Actions\Action;

class IndexPage extends Action
{
    public function authorize()
    {
        return true;
    }

    public function handle()
    {
        return view('auditlog::index');
    }
}