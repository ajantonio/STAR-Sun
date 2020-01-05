<?php

namespace Modules\ParentalMaritalStatus\Entities;

use Modules\System\Entities\Model;

class ParentalMaritalStatus extends Model
{
    protected $connection = 'sm_commondb_con';
    protected $table = 'parental_marital_statuses';

    public $incrementing = true;
    protected $keyType = 'string';

    protected $fillable = ['name', 'description'];
}
