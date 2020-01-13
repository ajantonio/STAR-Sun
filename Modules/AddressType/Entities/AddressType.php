<?php

namespace Modules\AddressType\Entities;

use Modules\System\Entities\Model;

class AddressType extends Model
{
    protected $connection = 'sm_commondb_con';
    protected $table = 'address_types';
    public $incrementing = true;
    protected $keyType = 'string';
    protected $fillable = ['name', 'description'];
}
