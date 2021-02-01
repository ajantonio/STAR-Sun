<?php

namespace Modules\TermCycle\Actions;

use Lorisleiva\Actions\Action;
use Modules\TermCycle\Entities\TermCycle;

class UpdateTermCycle extends Action
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
     * @return mixed
     */
    public function handle(TermCycle $termcycle)
    {
        // Execute the action.
        $termcycle->name = $this->name;
        $termcycle->description = $this->description;
        $termcycle->save();

        return $termcycle;
    }
}
