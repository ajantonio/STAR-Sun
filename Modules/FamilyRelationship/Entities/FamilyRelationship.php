<?php

namespace Modules\FamilyRelationship\Entities;

use Modules\System\Entities\Model;

class FamilyRelationship extends Model
{
    protected $connection = 'sm_commondb_con';
    protected $table = 'family_relationships';

    public $incrementing = true;
    protected $keyType = 'string';

    protected $fillable = ['name', 'description'];
}
