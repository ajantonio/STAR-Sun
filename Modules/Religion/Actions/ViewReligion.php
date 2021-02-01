<?php

namespace Modules\Religion\Actions;

use Lorisleiva\Actions\Action;
use Modules\Religion\Entities\Religion;

class ViewReligion extends Action
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
    public function handle(Religion $religion)
    {
        return $religion;
    }
}
