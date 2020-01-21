<?php

namespace Modules\EducationLevel\Entities;

use Modules\System\Entities\Model;
use Modules\SchoolLevel\Entities\SchoolLevel;

class EducationLevel extends Model
{
    protected $connection = 'sm_commondb_con';
    protected $table = 'education_levels';
    public $incrementing = true;
    protected $fillable = [];
}
