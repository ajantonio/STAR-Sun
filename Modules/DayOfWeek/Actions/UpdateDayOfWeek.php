<?php

namespace Modules\DayOfWeek\Actions;

use Lorisleiva\Actions\Action;
use Modules\DayOfWeek\Entities\DayOfWeek;

class UpdateDayOfWeek extends Action
{
    /**
     * Determine if the user is authorized to make this action.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('update-day-of-week');
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
    public function handle(DayOfWeek $dayofweek)
    {
        // Execute the action.
        $dayofweek->day_string = $this->day_string;
        $dayofweek->save();

        return $dayofweek;
    }
}
