<?php

namespace Modules\Role\Entities;

use Spatie\Permission\Models\Role as BaseRole;

class Role extends BaseRole
{
    public $incrementing = false;
    protected $keyType = 'string';

}
