<?php

namespace Modules\Period\Entities;

use Modules\System\Entities\Model;

class Period extends Model
{
    protected $connection = 'sm_geninfdb_con';
    protected $table = 'periods';
    public $incrementing = true;
    protected $keyType = 'string';
    protected $fillable = ['name', 'description'];
}
