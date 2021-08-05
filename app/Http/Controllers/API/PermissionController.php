<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Permission;

class PermissionController extends ResourceController
{
    public function __construct(Permission $model)
    {
        $this->resource = $model;

        $this->middleware(function ($request, $next) {
            $this->request = $request;
            return $next($request);
        });
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($team_id = null)
    {
        if ($team_id) {
            return $this->resource->where('team_id', $team_id)->get();
        }

        return $this->resource->get();
    }
}