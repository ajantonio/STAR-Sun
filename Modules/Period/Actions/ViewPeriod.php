<?php

namespace Modules\Period\Actions;

use Lorisleiva\Actions\Action;
use Modules\Period\Entities\Period;

class ViewPeriod extends Action
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
     * @param Period $period
     * @return mixed
     */
    public function handle(Period $period)
    {
        // Execute the action.
        return $period;
    }
}
