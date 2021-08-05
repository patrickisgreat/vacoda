<?php

namespace App\Traits\Roles;

use App\Contracts\Permission as PermissionContract;
use App\Contracts\Role as RoleContract;
use App\Traits\Roles\HasPermissions;
use App\Traits\Roles\RefreshesPermissionCache;
use App\Role;
use App\Permission;
use App\Http\Requests\Request;
use Auth;
use Log;

trait HasRoles
{
    use HasPermissions;
    use RefreshesPermissionCache;

    /**
     * A user may have multiple roles.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles($team_id=null)
    {


        return $this->belongsToMany('App\Role')->withPivot('team_id');

        //return $this->belongsToMany('App\Role')->withPivot('team_id');

    }

    /**
     * A user may have multiple direct permissions.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function permissions()
    {
        return $this->belongsToMany(
            Permission::class
        );
    }

    /**
     * Assign the given role to the user.
     *
     * @param string|Role $role
     *
     * @return Role
     */
    public function assignRole($role, $team_id=null)
    {
        if ($team_id) {
           $this->roles()->save($this->getStoredRole($role), ['team_id' => $team_id]);
        } else {
            $this->roles()->save($this->getStoredRole($role));
        }
    }

    /**
     * Revoke the given role from the user.
     *
     * @param string|Role $role
     *
     * @return mixed
     */
    public function removeRole($role, $team_id = null)
    {
        if ($team_id) {
            $this->roles()->detach($this->getStoredRole($role), ['team_id' => $team_id]);
        } else {
            $this->roles()->detach($this->getStoredRole($role));
        }
    }

    /**
     * Determine if the user has (one of) the given role(s).
     *
     * @param string|array|Role|\Illuminate\Support\Collection $roles
     *
     * @return bool
     */
    public function hasRole($roles)
    {
        if (is_string($roles)) {
            return $this->roles->contains('name', $roles);
        }

        if ($roles instanceof RoleContract) {
            return $this->roles->contains('id', $roles->id);
        }

        if (is_array($roles)) {
            foreach ($roles as $role) {
                if ($this->hasRole($role)) {
                    return true;
                }
            }

            return false;
        }
        return !! $roles->intersect($this->roles)->count();
    }

    /**
     * Determine if the user has any of the given role(s).
     *
     * @param string|array|Role|\Illuminate\Support\Collection $roles
     *
     * @return bool
     */
    public function hasAnyRole($roles)
    {
        return $this->hasRole($roles);
    }

    /**
     * Determine if the user has all of the given role(s).
     *
     * @param string|Role|\Illuminate\Support\Collection $roles
     *
     * @return bool
     */
    public function hasAllRoles($roles)
    {
        if (is_string($roles)) {
            return $this->roles->contains('name', $roles);
        }

        if ($roles instanceof RoleContract) {
            return $this->roles->contains('id', $roles->id);
        }

        $roles = collect()->make($roles)->map(function ($role) {
            return $role instanceof Role ? $role->name : $role;
        });

        return $roles->intersect($this->roles->lists('name')) == $roles;
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
        //make sure the team owner can do everything
        if ($this->ownsTeam($this->currentTeam())) {
            return true;
        }

        if (is_string($permission)) {
            $permission = app(Permission::class)->findByName($permission);
        }

        //return $this->hasDirectPermission($permission) || may use in the future.... hmmm...
        return $this->hasPermissionViaRole($permission);
    }

  

    /**
     * Determine if the user has, via roles, the given permission.
     *
     * @param Permission $permission
     *
     * @return bool
     */
    protected function hasPermissionViaRole(PermissionContract $permission)
    {
        return $this->hasRole($permission->roles);
    }

    /**
     * Determine if the user has the given permission.
     *
     * @param string|Permission $permission
     *
     * @return bool
     */
    protected function hasDirectPermission($permission)
    {
        if (is_string($permission)) {
            $permission = app(Permission::class)->findByName($permission);
            if (!$permission) {
                return false;
            }
        }

        return $this->permissions->contains('id', $permission->id);
    }

    /**
     * @param $role
     *
     * @return Role
     */
    protected function getStoredRole($role)
    {
        if (is_string($role)) {
            return app(Role::class)->findByName($role);
        }

        return $role;
    }
}
