<?php

namespace Modules\Campus\Actions;

use Lorisleiva\Actions\Action;
use Modules\Campus\Entities\Campus;

class DeleteCampus extends Action
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
    public function handle(Campus $campus)
    {
        $campus->delete();

        return $campus;
    }

    public function jsonResponse($result, $request)
    {
        return $result;        
    }

    public function htmlResponse($results, $request)
    {
        return redirect()->back();
    }
}
