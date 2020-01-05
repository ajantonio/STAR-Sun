<?php

namespace Modules\Religion\Entities;

use Modules\System\Entities\Model;

class Religion extends Model
{
    protected $connection = 'sm_commondb_con';
    protected $table = 'religions';

    public $incrementing = true;
    protected $keyType = 'string';
    protected $fillable = ['name', 'description'];
}
