<?php

namespace App\Contracts\Repositories;

use App\Team;

interface AuditTrailRepository
{
    /**
     * Get the activity
     * Matching the id
     *
     * @param  string $name
     * @param  int    @id
     * @param  int    @team_id
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function get_banner_activities($id);

    /**
     * Build a list of activities by team
     * @return mixed
     */
    public function list($team_id);

    /**
     * Compares old activity state with latest
     * and returns the changes
     *
     * @param $activity
     */
    public function diff_activities($activity);

    /**
     * Builds the final data set
     * To send out to the view
     *
     * @param $activity
     */
    public function build_activities($activity);


}