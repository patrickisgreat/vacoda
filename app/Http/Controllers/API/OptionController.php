<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Option;
use App\Team;

class OptionController extends ResourceController
{
    public function __construct(Option $model)
    {
        $this->resource = $model;

        $this->rules = [
            'option_type_id' => 'required|integer',
            'name'           => 'required|max:255',
            'abbreviation'   => 'max:255',
        ];

        $this->middleware(function ($request, $next) {
            $this->request = $request;

            // because null user in artisan session breaks artisan route:list
            $this->team_id = null;
            
            if ($this->request->user()) {
                $this->team_id = $this->request->user()->currentTeam->id;
            }

            $this->fields = [
                'team_id'        => $this->team_id,
                'option_type_id' => $this->request->option_type_id,
                'name'           => $this->request->name,
                'abbreviation'   => $this->request->abbreviation,
            ];

            return $next($request);
        });
    }
}
