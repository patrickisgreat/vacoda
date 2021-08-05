<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Contracts\Auth\Access\Gate;
use Illuminate\Contracts\Cache\Repository;
use Log;
use App\Contracts\Permission;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Guard;
use App\User;
use Illuminate\Http\Request;

class PermissionRegistrar
{
    /**
     * @var Auth
     */
    protected $auth;

    /**
     * @var Gate
     */
    protected $gate;

    /**
     * @var Repository
     */
    protected $cache;

    /**
     * @var string
     */
    protected $cacheKey = 'vacoda.permission.cache';

    /**
     * @param Gate       $gate
     * @param Repository $cache
     */
    public function __construct(Gate $gate, Repository $cache, Guard $auth)
    {
        $this->gate = $gate;
        $this->auth = $auth;
        $this->cache = $cache;
    }

    /**
     *  Register the permissions.
     *
     * @return bool
     */
    public function registerPermissions($teamId)
    {
        //Log::info('PermissionRegistrar > registerPermissions');

        Log::info('teamId');
        Log::info($teamId);

        try {
            $permissions = $this->getPermissions($teamId)->map(function ($permission) {
                $this->gate->define($permission->name, function ($user) use ($permission) {
                    return $user->hasPermissionTo($permission);
                });
                return $permission->name;
            });

            $permissionsCache = $this->cache->get($this->cacheKey);
            return true;
        } catch (Exception $e) {
            Log::alert('Could not register permissions');

            return false;
        }
    }

    /**
     *  Forget the cached permissions.
     */
    public function forgetCachedPermissions()
    {
        //Log::info('PermissionRegistrar > forgetCachedPermissions');
        $this->cache->forget($this->cacheKey);
    }

    /**
     * Get the current permissions.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    protected function getPermissions($teamId)
    {
//        Log::info('PermissionRegistrar > getPermissions');
//        Log::info('teamId');
//        Log::info($teamId);

        return app(Permission::class)->where('team_id', '=', $teamId)->with(array('roles' => function($query) use($teamId) {
                $query->where('team_id', '=', $teamId);
            }))->get();

//        return $this->cache->rememberForever($this->cacheKey, function () use ($teamId) {
//            Log::info('getPermissions:rememberForever');
//
//            return app(Permission::class)->where('team_id', '=', $teamId)->with(array('roles' => function($query) use($teamId) {
//                $query->where('team_id', '=', $teamId);
//            }))->get();
//        });
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->user()) {
            $teamId = $this->auth->user()->currentTeam->id;
            $test = $this->registerPermissions($teamId);
        }
        return $next($request);

    }
}
