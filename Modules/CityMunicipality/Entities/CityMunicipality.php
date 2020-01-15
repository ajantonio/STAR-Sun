<?php

namespace Modules\CityMunicipality\Entities;

use Modules\System\Entities\Model;

class CityMunicipality extends Model
{
    protected $connection = 'sm_commondb_con';
    protected $table = 'city_municipalities';
    public $incrementing = true;
    //protected $keyType = 'string';
    protected $fillable = [];
}
