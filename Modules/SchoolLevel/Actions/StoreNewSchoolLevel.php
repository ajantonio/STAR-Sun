<?php

namespace Modules\SchoolLevel\Actions;

use Lorisleiva\Actions\Action;
use Modules\SchoolLevel\Entities\SchoolLevel;
use Illuminate\Support\Str;


class StoreNewSchoolLevel extends Action
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
        return [
            'name' => 'required|unique:name.sm_commondb_con',
            'education_level_id' =>'required'
        ];
    }

    /**
     * Execute the action and return a result.
     *
     * @return mixed
     */
    public function handle()
    {
        $schoollevel = new SchoolLevel();
        $schoollevel->education_level_id = $this->education_level_id;
        $schoollevel->name = $this->name;
        $schoollevel->description= $this->description;  
        $schoollevel->save();

        return $schoollevel;
    }
}
