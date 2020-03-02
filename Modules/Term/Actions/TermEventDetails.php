<?php


namespace Modules\Term\Actions;


use Lorisleiva\Actions\Action;
use Modules\Term\Entities\Term;

class TermEventDetails extends Action
{
    public function rules()
    {
        return [
            'id' => 'required'
        ];
    }

    public function handle()
    {
        return Term::with('event_details.term_event')
            ->where('id', $this->id)
            ->first();
    }
}