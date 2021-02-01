<?php 

namespace Modules\EducationLevel\Actions;

use Lorisleiva\Actions\Action;
use Modules\EducationLevel\Entities\EducationLevel;

class GetAllEducationLevel extends Action
{
    /**
     * Determine if the user is authorized to make this action.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Execute the action and return a result.
     *
     * @return mixed
     */
    public function handle()
    {
        return EducationLevel::orderBy('name')->get();
    }
}