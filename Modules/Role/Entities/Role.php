<?php

namespace Modules\Role\Entities;

use Modules\System\Entities\Model;

class Role extends Model
{
    //protected $connection = '';
    //protected $table = '';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [];
}
