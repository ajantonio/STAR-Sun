<?php

namespace Modules\CivilStatus\Entities;

use Modules\System\Entities\Model;

class CivilStatus extends Model
{
    protected $connection = 'sm_commondb_con';
    protected $table = 'civil_statuses';

    public $incrementing = true;
    protected $keyType = 'string';
    protected $fillable = ['name', 'description'];
}
