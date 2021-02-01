<?php

namespace Modules\DayOfWeek\Actions;

use Lorisleiva\Actions\Action;
use Modules\DayOfWeek\Entities\DayOfWeek;

class DeleteDayOfWeek extends Action
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
    public function handle(DayOfWeek $dayofweek)
    {
        // Execute the action.
        $dayofweek->delete();

        return $dayofweek;
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
