<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Exception;
use App\Team;
use Auth;
use Log;

abstract class ResourceController extends Controller
{
    protected $request;
    protected $resource;
    protected $rules;
    protected $fields;

    public function doValidation()
    {
        $this->validate($this->request, $this->rules);
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

        return $this->resource->where('team_id', $this->team_id)->get();
    }

    /**
     * Store a newly created resource.
     *
     * @return Response
     */
    public function store()
    {
        $this->doValidation();

        $this->fields['creator_id'] = $this->request->user()->id;
        $resource = new $this->resource();
        $resource->fill($this->fields);

        try {
            $created = $resource->save() ? 'true' : 'false';

            return response()->json([
                'created' => $created,
                'id'      => "{$resource->id}"
            ]);

        } catch (Exception $e) {
            return response()->json([
                'created' => 'false',
                'error'   => $e
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        return $this->resource->withTrashed()->findOrFail($id);
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
            $updated = $this->resource->findOrFail($id)->fill($this->fields)->save() ? 'true' : 'false';

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

    /**
     * Remove the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        try {
            $destroyed = $this->resource->findOrFail($id)->delete() ? 'true' : 'false';

            return response()->json([
                'destroyed' => $destroyed,
            ]);

        } catch (Exception $e) {
            return response()->json([
                'destroyed' => 'false',
                'error'     => $e
            ]);
        }
    }
}
