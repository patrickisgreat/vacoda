<?php

namespace App\Traits\Roles;

use App\Http\Middleware\PermissionRegistrar;
use Log;

trait RefreshesPermissionCache
{
    public static function bootRefreshesPermissionCache()
    {
        //Log::info('RefreshesPermissionCache > bootRefreshesPermissionCache');

        static::created(function ($model) {
            Log::info('forget:created');
            $model->forgetCachedPermissions();
        });

        static::updated(function ($model) {
            Log::info('forget:updated');
            $model->forgetCachedPermissions();
        });

        static::deleted(function ($model) {
            Log::info('forget:deleted');
            $model->forgetCachedPermissions();
        });
    }

    /**
     *  Forget the cached permissions.
     */
    public function forgetCachedPermissions()
    {
        app(PermissionRegistrar::class)->forgetCachedPermissions();
    }
}
