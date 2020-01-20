<?php

namespace Modules\TermCycle\Actions;

use Lorisleiva\Actions\Action;
use Modules\TermCycle\Entities\TermCycle;

class StoreNewTermCycle extends Action
{
    /**
     * Determine if the user is authorized to make this action.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('store-new-term-cycle');
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
        $termcycle = new TermCycle();
        $termcycle->name = $this->name;
        $termcycle->description = $this->description;
        $termcycle->save();

        return $termcycle;
    }
}
