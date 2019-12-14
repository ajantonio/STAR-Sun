<?php

namespace Modules\Role\Actions;

use Lorisleiva\Actions\Action;

class EditRole extends Action
{
    /**
     * Determine if the user is authorized to make this action.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('edit-role');
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
    public function handle()
    {
        // Execute the action.
    }

    /**
    * Response for web request
    */
    public function htmlResponse($result, $request){

    }

    /**
    * Response for API request
    */
    public function jsonResponse($result, $request){
        return $result;
    }
}
