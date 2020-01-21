<?php

namespace Modules\Term\Entities;

use Modules\System\Entities\Model;

class Term extends Model
{
    protected $connection = 'sm_geninfdb_con';
    protected $table = 'terms';

    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['campus_id', 'term_cycle_id', 'school_year', 'term', 'is_ongoing'];
}
