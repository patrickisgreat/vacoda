<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Permission;
use App\User;
use App\Contracts\Role as RoleContract;
use App\Exceptions\RoleDoesNotExist;
use App\Traits\Roles\HasPermissions;
use App\Traits\Roles\RefreshesPermissionCache;
use OwenIt\Auditing\Auditable;
use Log;


class Role extends Model implements RoleContract
{

    use HasPermissions;
    use RefreshesPermissionCache;
    use Auditable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'label',
        'name',
        'company_id'
    ];

    /**
     * A role may be given various permissions.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    /**
     * A role may be assigned to various users.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {

        return $this->belongsToMany(User::class);
    }

    /**
     * Find a role by its name.
     *
     * @param string $name
     *
     * @return Role
     *
     * @throws RoleDoesNotExist
     */
    public static function findByName($name)
    {
        $role = static::where('name', $name)->first();

        if (!$role) {
            throw new RoleDoesNotExist($role);
        }

        return $role;
    }

    /**
     * Determine if the user may perform the given permission.
     *
     * @param string|Permission $permission
     *
     * @return bool
     */
    public function hasPermissionTo($permission)
    {
        Log::info('Role > hasPermissionTo');
        Log::info('permission string');
        Log::info($permission);

        if (is_string($permission)) {
            $permission = app(Permission::class)->findByName($permission);
            Log::info('permission get');
            Log::info($permission);
        }

        return $this->permissions->contains('id', $permission->id);
    }

    public function givePermissionTo(Permission $permission)
    {
        return $this->permissions()->save($permission);
    }
}
