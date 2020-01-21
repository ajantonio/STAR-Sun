<?php

namespace Modules\Term\Actions;

use Lorisleiva\Actions\Action;
use Modules\Term\Entities\Term;

class UpdateTerm extends Action
{
    /**
     * Determine if the user is authorized to make this action.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('update-term');
    }

    /**
     * Get the validation rules that apply to the action.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'campus_id' => 'required',
            'term_cycle_id' => 'required',
            'school_year' => 'required',
            'term' => 'required',
            'is_ongoing' => 'required'
        ];
    }

    /**
     * Execute the action and return a result.
     *
     * @return mixed
     */
    public function handle(Term $term)
    {
        // Execute the action.
        $term->campus_id = $this->campus_id;
        $term->term_cycle_id = $this->term_cycle_id;
        $term->school_year = $this->school_year;
        $term->term = $this->term;
        $term->is_ongoing = $this->is_ongoing;
        $term->save();

        return $term;
    }
}
