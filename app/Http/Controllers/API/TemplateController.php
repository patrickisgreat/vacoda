<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Team;
use App\Template;

class TemplateController extends ResourceController
{
    public function __construct(Template $model)
    {
        $this->resource = $model;

        $this->rules = [
            'name'        => 'required|max:255',
            'description' => 'required|max:255',
            'html'        => 'required',
            'css'         => 'max:255',
        ];

        $this->middleware(function ($request, $next) {
            $this->request = $request;

            // because null user in artisan session breaks artisan route:list
            $this->team_id = null;

            if ($this->request->user()) {
                $this->team_id = $this->request->user()->currentTeam->id;
            }

            $this->fields = [
                'team_id'     => $this->team_id,
                'name'        => $this->request->name,
                'description' => $this->request->description,
                'html'        => $this->request->html,
                'css'         => $this->request->css,
            ];

            return $next($request);
        });
    }
}
