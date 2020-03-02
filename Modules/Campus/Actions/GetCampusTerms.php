<?php


namespace Modules\Campus\Actions;


use Lorisleiva\Actions\Action;
use Modules\Term\Entities\Term;

class GetCampusTerms extends Action
{
    public function rules()
    {
        return ['campus_id' => 'required'];
    }

    function handle()
    {


        $data = Term::with('term_cycle')->where('campus_id', $this->campus_id)
            ->orderByDesc('school_year')
            ->orderByDesc('term')
            ->get();

        return $data;
    }


}