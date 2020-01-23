<?php

namespace Modules\TermEventDetail\Actions;

use Lorisleiva\Actions\Action;
use Modules\TermEventDetail\Entities\TermEventDetail;

class GetTermEventDetailDetail extends Action
{
    /**
     * Determine if the user is authorized to make this action.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('get-term-event-detail-detail');
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
        return TermEventDetail::find($this->termeventdetail);
    }
}
