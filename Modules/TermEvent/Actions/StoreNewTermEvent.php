<?php

namespace Modules\TermEvent\Actions;

use Lorisleiva\Actions\Action;
use Modules\TermEvent\Entities\TermEvent;

class StoreNewTermEvent extends Action
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
        $termevent = new TermEvent();
        $termevent->name = $this->name;
        $termevent->description = $this->description;
        $termevent->save();

        return $termevent;
    }
}
