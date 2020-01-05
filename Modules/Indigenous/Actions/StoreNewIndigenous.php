<?php

namespace Modules\Indigenous\Actions;

use Lorisleiva\Actions\Action;
use Modules\Indigenous\Entities\Indigenous;

class StoreNewIndigenous extends Action
{
    /**
     * Determine if the user is authorized to make this action.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('store-new-indigenous');
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
        $indigenous = new Indigenous();
        $indigenous->name = $this->name;
        $indigenous->description = $this->description;
        $indigenous->save();

        return $indigenous;
    }
}
