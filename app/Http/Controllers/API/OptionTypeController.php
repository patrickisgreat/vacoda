<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\OptionType;
use App\Team;

class OptionTypeController extends ResourceController
{
    public function __construct(OptionType $model)
    {
        $this->resource = $model;

        $this->rules = [
            'name' => 'required|max:255',
        ];

        $this->middleware(function ($request, $next) {
            $this->request = $request;

            // because null user in artisan session breaks artisan route:list
            $this->team_id = null;
            
            if ($this->request->user()) {
                $this->team_id = $this->request->user()->currentTeam->id;
            }

            $this->fields = [
                'team_id' => $this->team_id,
                'name'    => $this->request->name,
            ];

            return $next($request);
        });
    }
}