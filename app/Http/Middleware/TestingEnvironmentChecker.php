<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth as Auth;

class TestingEnvironmentChecker
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
        if (app()->isLocal() && isset($_COOKIE['selenium_request'])) {
            config(['database.default' => 'mysql_testing']);
                  if (isset($_COOKIE['selenium_auth'])) {
                        Auth::loginUsingId((int) $_COOKIE['selenium_auth']);
                  }
        }
        return $next($request);
    }
}
