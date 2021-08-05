<?php

namespace App\Http\Middleware;

use Closure;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * for protecting entire routes
     * a la Route::group(['middleware' => ['role:team_admin, access_nic_cage_gifs']], function () {});
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    // app/Http/Middleware/RoleMiddleware.php
    public function handle($request, Closure $next, $role, $permission)
    {
        $team = $request->user()->currentTeam;

        if ($request->user()->ownsTeam($team)) {
            return $next($request);
        }

        if (! $request->user()->hasRole($role)) {
            abort(403);
        }

        if (! $request->user()->can($permission)) {
            abort(403);
        }

        return $next($request);
    }
}
