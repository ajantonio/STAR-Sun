<?php 

namespace Modules\Campus\Actions;

use Lorisleiva\Actions\Action;
use Modules\Campus\Entities\Campus;

class GetAllCampuses extends Action
{
    /**
     * Determine if the user is authorized to make this action.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('view-campus');        
    }

    /**
     * Execute the action and return a result.
     *
     * @return mixed
     */
    public function handle()
    {
        return Campus::orderBy('name')->get();
    }
}