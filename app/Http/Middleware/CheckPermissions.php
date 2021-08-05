<?php

namespace App\Http\Middleware;

use Closure;
use Gate;
use Log;
use App\Permission;

class CheckPermissions
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //Log::info('CheckPermissions > handle');

        $all_permissions = Permission::all();

        $uri = $request->path();

        //checking a one off permission from client side
        if (in_array('permission', explode('/', $uri)) && !$request->user()->ownsTeam($request->user()->currentTeam())) {
            if (!Gate::allows($request->permission)) {
                //Log::info('Client Side Permissions Check -- Forbidden status');
                //Log::info(explode('/', $uri));
                return response('Forbidden', 403);
            } else {
                //Log::info('Client Side Permissions Check -- Allowed Status');
                //Log::info(explode('/', $uri));
                return response('Allowed', 200);
            }
        }

        //otherwise build the permission to be checked from the request
        $route_with_controller_action_array = explode('\\', $request->route()->getActionName());

        $controller_with_action_array = explode('@', array_pop($route_with_controller_action_array));

        if (isset($controller_with_action_array[1])) {
            $permission = $controller_with_action_array[1] . '_' . strtolower(str_replace('Controller', '', $controller_with_action_array[0]));

//            Log::info('Permission Middleware: Route with Controller Action array-->');
//            Log::info($route_with_controller_action_array);
//            Log::info('Permission Middleware: Permission String to Check-->');
//            Log::info($permission);
//            Log::info('Permission Middleware: User making the Request:');
//            Log::info($request->user());
            $permission_exists = $all_permissions->filter( function ($item) use ($permission) {
                if ($item->name == $permission) {
                    return $item;
                }
            });

            if (!$permission_exists->isEmpty() && $request->user() && in_array('API', $route_with_controller_action_array) && !$request->user()->ownsTeam($request->user()->currentTeam())) {
                if (!Gate::allows($permission)) {
                    //Log::info('API route / permission returns Forbidden');
                    return response('Forbidden', 403);
                }
            }

            if (!$permission_exists->isEmpty() && $request->user() && !$request->user()->ownsTeam($request->user()->currentTeam())) {
                if (!Gate::allows($permission)) {
                    //Log::info('Web route / permission returns Forbidden');
                    return response()->view('errors.403', [], 403);
                }
            }
        }



        return $next($request);
    }

    public function terminate($request, $response)
    {
        $logFile = 'http.txt';
        //Log::useDailyFiles(storage_path().'/logs/'.$logFile);
        //do we really need this?
        // Log::info('app.requests', [
        //     'URL'      => $request->fullUrl(),
        //     'IP'       => $request->ip(),
        //     'Header'   => $request->header(),
        //     'response' => $response->getStatusCode()
        //     ]);
    }
}
