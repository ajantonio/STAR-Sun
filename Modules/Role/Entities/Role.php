<?php

namespace Modules\Role\Entities;

use Spatie\Permission\Models\Role as BaseRole;

class Role extends BaseRole
{
    //protected $connection = '';
    //protected $table = '';
    public $incrementing = false;
    protected $keyType = 'string';
}
