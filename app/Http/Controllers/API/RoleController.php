<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Permission;
use App\Role;
use App\User;
use App\Team;
use Auth;
use Log;
use Debugbar;

class RoleController extends ResourceController
{

    public function __construct(Role $model)
    {
        $this->resource = $model;

        $this->middleware(function ($request, $next) {
            $this->request = $request;
            $this->user = Auth::user();

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

        $allRoles = Role::all();

        $allRolesCount = $allRoles->count();

        $allPermissions = Permission::where('team_id', $team_id)->get();

        $team = Team::find($team_id);

        $roles = $team->roles()->with('permissions')->get();

        return compact('roles', 'allPermissions', 'allRolesCount');
    }

    public function updateRoles($team_id = null)
    {

        //@todo abort_unless has role edit capability or team owner

        $rawRequestData = $this->request->getContent();

        $encodedRequest = json_decode($rawRequestData);

        $team = Team::find($team_id);

        foreach ($encodedRequest as $requestedUpdates) {

            if ($roleToUpdate = Role::find($requestedUpdates->id)) {

                $roleToUpdate->name = trim($requestedUpdates->name);

                $team->roles()->save($roleToUpdate);

                $roleToUpdate->permissions()->sync($requestedUpdates->selectedPermissions);
            } else {
                $this->create($requestedUpdates, $team_id);
            }
        }
    }

    /**
     * Store a newly created resource.
     *
     * @return Response
     */
    public function create($newRoleRequest, $team_id)
    {
        $newRole = new Role;

        $newRole->name = trim($newRoleRequest->name);

        $newRole->label = strtolower(preg_replace('#[ _]+#', '_', $newRole->name));

        $newRole->team_id = $team_id;

        $save = $newRole->save();

        if ($save) {
            $newRolePermissions = $newRole->permissions()->sync($newRoleRequest->selectedPermissions);
        }

    }

    public function delete($team_id, $id)
    {
        $this->resource->findOrFail($id)->delete();
    }
}