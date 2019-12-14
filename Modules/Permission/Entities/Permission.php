<?php

namespace Modules\Permission\Entities;

class Permission extends \Spatie\Permission\Models\Permission
{
    protected $connection = '';
    protected $table = '';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [];
}
