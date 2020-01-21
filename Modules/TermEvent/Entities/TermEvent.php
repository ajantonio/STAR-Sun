<?php

namespace Modules\TermEvent\Entities;

use Modules\System\Entities\Model;

class TermEvent extends Model
{
    protected $connection = 'sm_geninfdb_con';
    protected $table = 'term_events';

    public $incrementing = true;
    protected $keyType = 'string';
    protected $fillable = ['name', 'description'];
}
