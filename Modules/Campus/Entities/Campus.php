<?php

namespace Modules\Campus\Entities;

use Modules\System\Entities\Model;

class Campus extends Model
{
    protected $connection = 'sm_commondb_con';
    protected $table = 'campuses';

    public $incrementing = false;
    protected $keyType = 'string';
    
    protected $fillable = [];    

    public function country()
    {
        return $this->belongsTo('Modules\Country\Entities\Country');
    }
}
