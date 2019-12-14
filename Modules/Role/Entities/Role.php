<?php

namespace Modules\Role\Entities;

class Role extends \Spatie\Permission\Models\Role
{
    protected $connection = '';
    protected $table = '';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [];
}
