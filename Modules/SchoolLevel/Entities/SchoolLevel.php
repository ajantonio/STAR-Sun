<?php

namespace Modules\SchoolLevel\Entities;

use Modules\System\Entities\Model;
use Modules\EducationLevel\Entities\EducationLevel;

class SchoolLevel extends Model
{
    protected $connection = 'sm_commondb_con';
    protected $table = 'school_levels';
    protected $fillable = ['name','education_level_id','description'];

    public function details()
    {
        return $this->hasMany(EducationLevel::class);
    }
}
