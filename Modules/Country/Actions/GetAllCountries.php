<?php 

namespace Modules\Country\Actions;

use Lorisleiva\Actions\Action;
use Modules\Country\Entities\Country;

class GetAllCountries extends Action
{
    /**
     * Determine if the user is authorized to make this action.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('view-any-country');
    }

    /**
     * Execute the action and return a result.
     *
     * @return mixed
     */
    public function handle()
    {
        return Country::orderBy('name')->get();
    }
}