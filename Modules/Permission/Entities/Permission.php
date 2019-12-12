<?php

namespace Modules\Permission\Entities;

use \Spatie\Permission\Models\Permission as BasePermission;

class Permission extends BasePermission
{

    public $incrementing = false;
    protected $keyType = 'string';

    public function scopeActive($query)
    {
        return $query->where('active', 'Yes');
    }
}
