<?php

namespace Modules\EducationLevel\Entities;

use Modules\System\Entities\Model;

class EducationLevel extends Model
{
    protected $connection = 'sm_commondb_con';
    protected $table = 'education_levels';
    public $incrementing = true;
    protected $keyType = 'string';
    protected $fillable = ['name','description'];
}
