<?php

namespace App\Http\Controllers\SparkExtensions;

use Laravel\Spark\Http\Controllers\Settings\Teams\TeamMemberRoleController;
use Laravel\Spark\Spark;
use Laravel\Spark\Http\Controllers\Controller;
use App\User;
use Log;

class VacodaTeamMemberRoleController extends TeamMemberRoleController {

    public function __construct ()
    {
        parent::__construct ();
    }

    /**
     * Get the available team member roles.
     *
     * @return Response
     */
    public function all()
    {
        $roles = [];

        $user = Auth::user();

        foreach (Spark::roles() as $key => $value) {

            $roles[] = [
                'id' => $value['id'],
                'name' => $value['name'],
                'label' => $value['label'],
                'team_id' => $value['team_id']
            ];
        }

        $roles = collect($roles);

        $roles->filter( function($role) {
            if ($role->team_id == $user->currentTeam->id) {
                return $role;
            }
        });

        return response()->json($roles);

    }
}