<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Team;
use App\VacodaSettings;

class VacodaSettingsController extends ResourceController
{
    public function __construct(VacodaSettings $model)
    {
        $this->resource = $model;

        $this->rules = [
            'active_date_precedence' => 'required|max:255',
        ];

        $this->middleware(function ($request, $next) {
            $this->request = $request;

            // because null user in artisan session breaks artisan route:list
            $this->team_id = null;
            
            if ($this->request->user()) {
                $this->team_id = $this->request->user()->currentTeam->id;
            }

            $this->fields = [
                'team_id'                => $this->team_id,
                'active_date_precedence' => $this->request->active_date_precedence,
            ];

            return $next($request);
        });
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id = null)
    {
        return $this->resource->where('team_id', $this->team_id)->firstOrFail();
    }

    /**
     * Update the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id = null, $team_id = null)
    {
        $this->doValidation();

        try {
            $updated = $this->resource->where('team_id', $this->team_id)->firstOrFail()->fill($this->fields)->save() ? 'true' : 'false';

            return response()->json([
                'updated' => $updated,
            ]);

        } catch (Exception $e) {
            return response()->json([
                'updated' => 'false',
                'error'   => $e
            ]);
        }
    }
}
