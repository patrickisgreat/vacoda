<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Exceptions\PermissionDoesNotExist;
use App\Traits\Roles\RefreshesPermissionCache;
use App\Contracts\Permission as PermissionContract;
use OwenIt\Auditing\Auditable;
use App\Role;
use Log;

class Permission extends Model implements PermissionContract
{

    use RefreshesPermissionCache, Auditable;

    protected $fillable = ['name', 'label', 'team_id'];

    /**
     * A permission can be applied to roles.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    /**
     * Find a permission by its name.
     *
     * @param string $name
     *
     * @throws PermissionDoesNotExist
     */
    public static function findByName($name)
    {
        Log::info('Permission > findByName');
        $permission = static::where('name', $name)->first();

        if (!$permission) {
            Log::info('findByName:PermissionDoesNotExist');
            throw new PermissionDoesNotExist();
        }

        return $permission;
    }
}
