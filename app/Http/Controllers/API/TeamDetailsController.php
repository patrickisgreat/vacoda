<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeamDetailsController extends Controller
{
    /**
     * Update the given team's details.
     *
     * @param  Request $request
     * @param  \Laravel\Spark\Team $team
     * @return Response
     */
    public function update(Request $request, $team)
    {
        abort_unless($request->user()->ownsTeam($team), 404);

        $this->validate($request, [
            'description'        => 'required|max:255',
            'team_contact_name'  => 'max:255',
            'team_contact_email' => 'email|max:255',
        ]);

        $team->forceFill([
            'description'        => $request->description,
            'team_contact_name'  => $request->team_contact_name,
            'team_contact_email' => $request->team_contact_email,
        ])->save();
    }
}
