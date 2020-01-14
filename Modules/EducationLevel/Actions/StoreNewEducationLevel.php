<?php

namespace Modules\EducationLevel\Actions;

use Lorisleiva\Actions\Action;
use Modules\EducationLevel\Entities\EducationLevel;

class StoreNewEducationLevel extends Action
{
    /**
     * Determine if the user is authorized to make this action.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('store-new-educationlevel');
    }

    /**
     * Get the validation rules that apply to the action.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'required',
        ];
    }

    /**
     * Execute the action and return a result.
     *
     * @return mixed
     */
    public function handle()
    {
       $educationlevel = new EducationLevel();
       $educationlevel->name = $this->name;
       $educationlevel->description = $this->description;
       $educationlevel->save();

       return $educationlevel;
    }
}
