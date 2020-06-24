<?php

namespace Modules\Country\Entities;

use Illuminate\Database\Eloquent\Model;

class PhilProvince extends Model
{
    protected $connection = 'sm_commondb_con';
    protected $table = 'phil_provinces';
    protected $keyType = 'string';
    public $incrementing = false;
    protected $guarded = [];
}
