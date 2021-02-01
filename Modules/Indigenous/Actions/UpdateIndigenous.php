<?php

namespace Modules\Indigenous\Actions;

use Lorisleiva\Actions\Action;
use Modules\Indigenous\Entities\Indigenous;

class UpdateIndigenous extends Action
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
    public function handle(Indigenous $indigenous)
    {
        $indigenous->name = $this->name;
        $indigenous->description = $this->description;
        $indigenous->save();

        return $indigenous;
    }
}
