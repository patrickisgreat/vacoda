<?php

namespace App\Repositories;

use App\Contracts\Repositories\CategoryRepositoryContract as CategoryContract;
use Illuminate\Database\Eloquent\Collection;
use App\Category;
use App\Team;
use Cache;
use Auth;

class CategoryRepository implements CategoryContract {

    /**
     * @var Repository
     */
    protected $cache;

    public $category;

    /**
     * @param Repository $cache
     * @param Category $category
     */
    public function __construct(Cache $cache, Category $category)
    {
        $this->cache = $cache;
        $this->category = $category;
    }

    /**
     * Get the category matching this id, depth, and team.
     *
     * @param  string|int  $id
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function find($name, $depth, $team_id) {
        return Category::where('name', '=', $name)->where('depth', '=', $depth)->where('team_id', '=', $team_id)->first();

    }


    /**
     * Get the entire tree as a collection.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function all() {
        return Category::all();
    }

    /**
     * Get the root category
     *
     * @param string|int $name
     * @param int $depth
     * @param int $team_id
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function findRoot($name, $depth, $team_id) {

    }

    /**
     * Get all of the categories for a given Team
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function teamCategories($team) {

    }


    /**
     * Save a new Category
     *
     * @param \App\Team  $team
     * @param  array  $data
     * @return Team
     */
    public function save($name, $depth, $teamId) {

        $cacheKey = 'vacoda.category.'.$depth;

        if ($depth === 0) {

            $root = $this->category->create(['name' => $name, 'team_id' => $teamId]);

            $root->save();

            return Cache::forever($cacheKey, $root->name);
        }

        if ($depth > 0) {

            $lastDepth = (string) $depth - 1;

            $last_cached_category_key = 'vacoda.category.'.$lastDepth;

            $last_cached_category_name = Cache::get($last_cached_category_key);

            $last_cached_category = static::find($last_cached_category_name, $lastDepth, $teamId);

            $new_child_category = $last_cached_category->children()->create(['name' => $name, 'team_id' => $teamId]);

            $new_child_category->save();

            $store_current_category_in_cache = Cache::forever($cacheKey, $new_child_category->name);

            return $new_child_category;
        }

        return response()->json(['error' => 'something is wrong in save method']);

    }


    /**
     * @param $teamId
     * @param $nodes
     * @return mixed
     */
    public static function filterByTeam($teamId, $nodes) {
        $filtered_categories = $nodes->filter(function ($category) use ($teamId){
            if ($category->team_id == $teamId) {
                return $category;
            }
        });

        return $filtered_categories;
    }

    /**
     * Get All Roots
     *
     * @return Collection
     */
    public static function getRoots($teamId) {

        $category_roots = Category::roots()->get();

        return self::filterByTeam($teamId, $category_roots);
    }


    /**
     * Get the entire Tree
     * @param int $teamId
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function getTree($teamId) {

//        $roots = self::getRoots($teamId);
//
//        $tree = $roots->map( function($category) {
//            //return $category->getDescendantsAndSelf()->toHierarchy();
//        });
        return Category::where('team_id', $teamId)->get()->toHierarchy();
        //return $tree;
    }


}