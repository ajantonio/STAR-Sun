<?php

namespace Modules\School\Entities;

use Modules\System\Entities\Model;
use Modules\Country\Entities\Country;

class school extends Model
{
    protected $connection = 'sm_commondb_con';
    protected $table = 'schools';
    
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [];

    public function details()
    {
        return $this->hasMany(Country::class);
    }
}
