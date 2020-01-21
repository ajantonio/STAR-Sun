<?php

namespace Modules\TermCycle\Entities;

use Modules\System\Entities\Model;

class TermCycle extends Model
{
    protected $connection = 'sm_geninfdb_con';
    protected $fillable = ['name', 'description'];

}
