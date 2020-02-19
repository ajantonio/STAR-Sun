<?php

namespace Modules\Term\Actions;

use Lorisleiva\Actions\Action;
use Modules\Term\Entities\Term;

class ViewTerm extends Action
{
    /**
     * Determine if the user is authorized to make this action.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('view-term');
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
    public function handle(Term $term)
    {
        // Execute the action.
        return view('term::view', compact('term'));
    }
}
