<?php

namespace Modules\ContactType\Entities;

use Modules\System\Entities\Model;

class ContactType extends Model
{
    protected $connection = 'sm_commondb_con';
    protected $table = 'contact_types';
    public $incrementing = true;
    protected $keyType = 'string';
    protected $fillable = ['name', 'description'];
}
