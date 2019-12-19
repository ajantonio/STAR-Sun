<?php

namespace Modules\Test\Entities;

use Modules\System\Entities\Model;

class Test extends Model
{
    //protected $connection = '';
    //protected $table = '';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [];
}
