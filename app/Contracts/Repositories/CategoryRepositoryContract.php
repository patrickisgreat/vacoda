<?php

namespace App\Contracts\Repositories;

use App\Team;

interface CategoryRepositoryContract
{
    /**
     * Get the category matching this id.
     *
     * @param  string $name
     * @param  int    @depth
     * @param  int    @team_id
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function find($name, $depth, $team_id);

    /**
     * Get the entire tree as a collection.
     *
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function all();

    /**
     * Get all of the categories for a given Team
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function teamCategories($team);

    /**
     * Create a new category on a given team
     *
     * @param \App\Team  $team
     * @param  array  $data
     * @return Team
     */
    public function save($name, $depth, $team_id);

    /**
     * Get the roots for all categories
     *
     * @param int $teamId
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function getRoots($teamId);

    /**
     * Get the entire Tree
     * @param int $teamId
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function getTree($teamId);

}