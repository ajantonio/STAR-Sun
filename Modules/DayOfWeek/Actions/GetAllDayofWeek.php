<?php

namespace Modules\DayOfWeek\Actions;

use Lorisleiva\Actions\Action;
use Modules\DayOfWeek\Entities\DayOfWeek;

class GetAllDayofWeek extends Action
{
    /**
     * Determine if the user is authorized to make this action.
     *
     * @return bool
     */
    public function authorize()
    {
        // return $this->user()->can('view-any-dayof-week');
        return true;
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
        // Execute the action.
        return DayOfWeek::orderBy('id')->get();
    }
}
