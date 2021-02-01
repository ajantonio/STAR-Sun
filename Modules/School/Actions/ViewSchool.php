<?php

namespace Modules\School\Actions;

use Lorisleiva\Actions\Action;
use Modules\School\Entities\School;

class ViewSchool extends Action
{
    public function authorize()
    {
        return true;
    }

    public function handle(School $school)
    {
        return view('school::view', compact('school'));
    }
}