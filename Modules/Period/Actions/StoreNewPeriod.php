<?php

namespace Modules\Period\Actions;

use Lorisleiva\Actions\Action;
use Modules\Period\Entities\Period;

class StoreNewPeriod extends Action
{
    /**
     * Determine if the user is authorized to make this action.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('store-new-period');
    }

    /**
     * Get the validation rules that apply to the action.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required'
        ];
    }

    /**
     * Execute the action and return a result.
     *
     * @return mixed
     */
    public function handle()
    {
        // Execute the action.
        $period = new Period();
        $period->name = $this->name;
        $period->description = $this->description;
        $period->save();

        return $period;
    }
}
