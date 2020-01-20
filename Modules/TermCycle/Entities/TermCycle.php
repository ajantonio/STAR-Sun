<?php

namespace Modules\TermCycle\Entities;

use Modules\System\Entities\Model;

class TermCycle extends Model
{
    protected $connection = 'sm_geninfdb_con';
    protected $table = 'term_cycles';
    public $incrementing = true;
    protected $keyType = 'string';
    protected $fillable = ['name', 'description'];
}
