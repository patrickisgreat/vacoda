<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Permission;
use App\Category;
use Debugbar;
use App\Role;
use App\User;
use App\Team;
use Auth;
use Log;

class CategoryController extends ResourceController
{

    public function __construct(Category $model)
    {
        $this->resource = $model;

        $this->middleware(function ($request, $next) {
            $this->request = $request;

            // because null user in artisan session breaks artisan route:list
            $this->team_id = null;

            if ($this->request->user()) {
                $this->team_id = $this->request->user()->currentTeam->id;
            }

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
        return Category::where('team_id', $this->team_id)->get();
    }

}