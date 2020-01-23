<?php

namespace Modules\TermEventDetail\Entities;

use Modules\System\Entities\Model;
use Modules\Term\Entities\Term;
use Modules\TermEvent\Entities\TermEvent;

class TermEventDetail extends Model
{
    protected $connection = 'sm_geninfdb_con';
    protected $table = 'term_event_details';

    public $incrementing = true;
//    protected $keyType = 'string';
    protected $fillable = ['term_id', 'term_event_id', 'datetime_start', 'datetime_end'];

    public function term()
    {
        return $this->belongsTo(Term::class);
    }

    public function term_event()
    {
        return $this->belongsTo(TermEvent::class);
    }
}
