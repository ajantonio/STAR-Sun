<?php

namespace Modules\User\Entities;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Modules\Role\Entities\Role;
use OwenIt\Auditing\Contracts\Auditable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements Auditable
{
    use Notifiable, HasRoles, SoftDeletes, HasApiTokens;
    use \OwenIt\Auditing\Auditable;

    public $incrementing = false;
    protected $keyType = 'string';

    protected $guard_name = 'web';
    protected $guarded = ['password'];
    protected $dates = ['deleted_at', 'created_at', 'updated_at'];

    public function getCanImpersonateAttribute(): bool
    {
        return $this->can('impersonate-user');
    }

    public function syncAccessRoles($roles)
    {
        $this->syncRoles($roles);

        $permissions = collect([]);
        foreach ($roles as $role) {
            $role = Role::find($role);
            $permissions = $permissions->merge($role->permissions);
        }

        $this->syncPermissions($permissions->all());
        $this->forgetCachedPermissions();

        return $this;
    }
}
