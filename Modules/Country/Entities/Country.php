<?php

namespace Modules\Country\Entities;

use Modules\System\Entities\Model;

class Country extends Model
{
    protected $connection = 'sm_commondb_con';
    protected $table = 'countries';

    public $incrementing = true;
    protected $keyType = 'string';

    protected $fillable = ['name', 'description', 'nationality'];
}
