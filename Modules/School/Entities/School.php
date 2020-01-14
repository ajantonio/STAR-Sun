<?php

namespace Modules\School\Entities;

use Modules\System\Entities\Model;

class school extends Model
{
    protected $connection = 'sm_commondb_con';
    protected $table = 'schools';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [];
}
