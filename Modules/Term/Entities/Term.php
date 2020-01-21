<?php

namespace Modules\Term\Entities;

use Modules\Campus\Entities\Campus;
use Modules\System\Entities\Model;
use Modules\TermCycle\Entities\TermCycle;

class Term extends Model
{
    protected $connection = 'sm_geninfdb_con';
    protected $table = 'terms';

    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['campus_id', 'term_cycle_id', 'school_year', 'term', 'is_ongoing'];

    public function campusDetails()
    {
        return $this->belongsTo(Campus::class);
    }

    public function termCycledDetails()
    {
        return $this->belongsTo(TermCycle::class);
    }

}
