<?php

namespace Modules\Indigenous\Entities;

use Modules\System\Entities\Model;

class Indigenous extends Model
{
    protected $connection = 'sm_commondb_con';
    protected $table = 'indigenous';

    public $incrementing = true;
    protected $keyType = 'string';

    protected $fillable = ['name', 'description'];
}
