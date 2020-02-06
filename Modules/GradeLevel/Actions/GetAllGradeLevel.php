<?php

namespace Modules\GradeLevel\Actions;

use Lorisleiva\Actions\Action;
use Modules\GradeLevel\Entities\GradeLevel;

class GetAllGradeLevel extends Action
{
    /**
     * Determine if the user is authorized to make this action.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('get-all-grade-level');
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
    public function handle()
    {
        return GradeLevel::orderBy('name')->get();
    }
}