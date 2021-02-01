<?php

namespace Modules\Religion\Actions;

use Lorisleiva\Actions\Action;
use Modules\Religion\Entities\Religion;

class StoreNewReligion extends Action
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
        $religion = new Religion();
        $religion->name = $this->name;
        $religion->description = $this->description;
        $religion->save();

        return $religion;
    }
}
