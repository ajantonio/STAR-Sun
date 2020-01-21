<?php

namespace Modules\SchoolLevel\Actions;

use Lorisleiva\Actions\Action;
use Modules\SchoolLevel\Entities\SchoolLevel;

class DeleteSchoolLevel extends Action
{
    /**
     * Determine if the user is authorized to make this action.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('delete-school-level');
    }

    /**
     * Get the validation rules that apply to the action.
     *
     * @return array
     */
    public function rules()
    {
        return [];
    }

    /**
     * Execute the action and return a result.
     *
     * @return mixed
     */
    public function handle(SchoolLevel $schoollevel)
    {
        $schoollevel->delete();

        return $schoollevel;
    }

    public function jsonResponse($result, $request)
    {
        return $result;        
    }

    public function htmlResponse($results, $request)
    {
        return redirect()->back();
    }
}
