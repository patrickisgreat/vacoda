<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Team;
use App\Theme;

class ThemeController extends ResourceController
{
    public function __construct(Theme $model)
    {
        $this->resource = $model;

        $this->rules = [
            'name'                 => 'required|max:255',
            //'description'          => 'required|max:255',
            'font_color'           => 'required|max:255',
            'font_color_secondary' => 'max:255',
            'cta_font_color'       => 'required|max:255',
            'cta_bg_color'         => 'required|max:255',
            'background_color'     => 'required|max:255',
        ];

        $this->middleware(function ($request, $next) {
            $this->request = $request;

            // because null user in artisan session breaks artisan route:list
            $this->team_id = null;
            
            if ($this->request->user()) {
                $this->team_id = $this->request->user()->currentTeam->id;
            }

            $this->fields = [
                'team_id'              => $this->team_id,
                'name'                 => $this->request->name,
                'description'          => $this->request->description,
                'font_color'           => $this->request->font_color,
                'font_color_secondary' => $this->request->font_color_secondary,
                'cta_font_color'       => $this->request->cta_font_color,
                'cta_bg_color'         => $this->request->cta_bg_color,
                'background_color'     => $this->request->background_color,
            ];

            return $next($request);
        });
    }
}
