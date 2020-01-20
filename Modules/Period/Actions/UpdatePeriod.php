<?php

namespace Modules\Period\Actions;

use Lorisleiva\Actions\Action;
use Modules\Period\Entities\Period;

class UpdatePeriod extends Action
{
    /**
     * Determine if the user is authorized to make this action.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('update-period');
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
    public function handle(Period $period)
    {
        // Execute the action.
        $period->name = $this->name;
        $period->description = $this->description;
        $period->save();

        return $period;
    }
}
