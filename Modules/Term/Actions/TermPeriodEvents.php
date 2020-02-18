<?php


namespace Modules\Term\Actions;


use Lorisleiva\Actions\Action;
use Modules\Term\Entities\Term;

class TermPeriodEvents extends Action
{
    public function rules()
    {
        return [
            'id' => 'required'
        ];
    }

    public function handle()
    {
        return Term::with('period_events.period')
            ->where('id', $this->id)
            ->first();
    }
}