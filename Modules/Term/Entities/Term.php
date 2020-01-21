<?php

namespace Modules\Term\Entities;

use Modules\System\Entities\Model;

class Term extends Model
{
    //protected $connection = '';
    //protected $table = '';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [];
}
