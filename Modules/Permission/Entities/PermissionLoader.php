<?php


namespace Modules\Permission\Entities;


use Illuminate\Database\Eloquent\Builder;
use Spatie\Permission\Models\Permission as BasePermission;

class PermissionLoader extends BasePermission
{
    //protected $connection = '';
    protected $table = 'permissions';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [];

    protected static function booted()
    {
        static::addGlobalScope('active', function (Builder $builder) {
            $builder->where('active', '=', 'Yes');
        });

        //static::addGlobalScope('application', function (Builder $builder) {
         //   $builder->where('application_id', '=', config('app.id'));
        //});
    }
}
