<?php

namespace Modules\ResourceGroup\Entities;

use Modules\Application\Entities\Application;
use Modules\Link\Entities\Link;
use Modules\Permission\Entities\Permission;
use Modules\System\Entities\Model;

class ResourceGroup extends Model
{
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [];

    public function application()
    {
        return $this->belongsTo(Application::class);
    }

    public function links()
    {
        return $this->hasMany(Link::class);
    }

    public function permissions()
    {
        return $this->hasMany(Permission::class);
    }
}
