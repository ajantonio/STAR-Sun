<?php

namespace Modules\TermPeriodEvent\Entities;

use Modules\Period\Entities\Period;
use Modules\System\Entities\Model;
use Modules\Term\Entities\Term;
use Modules\TermEvent\Entities\TermEvent;

class TermPeriodEvent extends Model
{
    protected $connection = 'sm_geninfdb_con';
    protected $table = 'term_period_events';

//    public $incrementing = true;
//    protected $keyType = 'string';

    protected $fillable = [
        'term_id',
        'period_id',
        'term_event_id',
        'datetime_start',
        'datetime_end'
    ];

    public function term()
    {
        return $this->belongsTo(Term::class);
    }

    public function period()
    {
        return $this->belongsTo(Period::class);
    }

    public function term_event()
    {
        return $this->belongsTo(TermEvent::class);
    }
}




