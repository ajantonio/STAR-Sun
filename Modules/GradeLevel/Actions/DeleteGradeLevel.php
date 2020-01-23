<?php

namespace Modules\GradeLevel\Actions;

use Lorisleiva\Actions\Action;
use Modules\GradeLevel\Entities\GradeLevel;

class DeleteGradeLevel extends Action
{
    /**
     * Determine if the user is authorized to make this action.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('delete-gradelevel');
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
    public function handle(GradeLevel $gradelevel)
    {
        $gradelevel->delete();

        return $gradelevel;
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
