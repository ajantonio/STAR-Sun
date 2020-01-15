<?php

namespace Modules\DayOfWeek\Entities;

use Modules\System\Entities\Model;

class DayOfWeek extends Model
{
    protected $connection = 'sm_commondb_con';
    protected $table = 'day_of_weeks';

    public $incrementing = true;
    protected $keyType = 'string';
    protected $fillable = ['day_string'];
}
