<?php

namespace Modules\Attribute\Entities;

use Modules\System\Entities\Model;

class Attribute extends Model
{
    protected $connection = 'sm_commondb_con';
    protected $table = 'attributes';

    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = ['domain', 'key_value_name', 'description'];
}
