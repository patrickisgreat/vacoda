<?php

namespace App\Repositories;

use App\Contracts\Repositories\AuditTrailRepository as AuditTrailContract;
use Illuminate\Database\Eloquent\Collection;
use OwenIt\Auditing\Auditing as Auditing;
use App\Team;
use App\User;
use Auth;

/**
 * Class AuditTrailRepository
 * @package App\Repositories
 */
class AuditTrailRepository implements AuditTrailContract
{

    /**
     * the auditable instance
     */
    protected $auditing;


    /**
     * AuditTrailRepository constructor.
     * @param Auditing $auditing
     */
    public function __construct(Auditing $auditing)
    {
        $this->auditing = $auditing;
    }

    /**
     * @return mixed
     */
    public function list($team_id)
    {
        return $this->auditing->where('team_id', $team_id)
            ->where(function ($query) {
                $query->where('auditable_type', 'App\Banner')
                    ->orWhere('auditable_type', 'App\Offer');
            })->with('user')->orderBy('created_at', 'desc')->get();
    }

    /**
     * Builds a flat list of Human readable
     * activities per banner
     *
     *
     * @param $banner_id
     * @return \Illuminate\Support\Collection
     */
    public function build_activities($banner_id)
    {
        $activities = $this->get_banner_activities($banner_id);

        $changes = collect();

        $activities->each(function ($activity, $key) use ($changes) {
            $user = User::where('id', $activity->user_id)->first();

            if ($activity->type == "created" || $activity->type == "archived" || $activity->type == "deleted" || $activity->type == "approved" || $activity->type == "denied" || $activity->type == "Auto Archived") {
                $changes->push(collect([
                    "type"        => str_replace("App\\", "", $activity->auditable_type),
                    "action"      => $activity->type,
                    "user"        => $user->name,
                    "pretty_date" => date('F d, Y', strtotime($activity->created_at)),
                    "timestamp"   => $activity->created_at,
                ]));
            } else {
                $diffs = $this->diff_activities($activity);

//                if (isset($activity->old['campaign']) && $activity->old['campaign'] == "") {
//                    unset($diffs['campaign']);
//                }

                $diffs = collect($diffs);

                $diffs->each(function ($diff, $key) use ($activity, $user, $changes) {
                    $type = $key;
                    switch ($key) {
                        case "name":
                            $type = "Name";
                            break;
                        case "offer_id":
                            $type = "Offer";
                            break;
                        case "template_id":
                            $type = "Template";
                            break;
                        case "theme_id":
                            $type = "Theme";
                            break;
                        case "start_date":
                            $type = "Active Dates";
                            break;
                        case "end_date":
                            $type = "Active Dates";
                            break;
                        case "headline_font_size":
                            $type = "Headline Font Size";
                            break;
                        // case "sub_headline":
                        //     $type = "Sub Headline";
                        //     break;
                        case "body_font_size":
                            $type = "Body Font Size";
                            break;
                        case "legal_copy":
                            $type = "Legal Copy";
                            break;
                        case "image_file_name":
                            $type = "Image File";
                            break;
                        case "image_alt":
                            $type = "Image Alt Text";
                            break;
                        case "campaign":
                            $type = "Marketing Segmentation";
                            break;
                        case "deleted_at":
                            $type = "Unarchived";
                            break;
                    }

                    if ($type != 'created_at' && $type != 'updated_at' && $type != 'compiled_html' && $type != 'sfmc_image_url' && $type != 'status') {
                        $changes->push(collect([
                            "type"        => ucwords($type),
                            "action"      => $activity->type,
                            "user"        => $user->name,
                            "pretty_date" => date('F d, Y', strtotime($activity->created_at)),
                            "timestamp"   => $activity->created_at
                        ]));
                    }
                });
            }
        });

        $changes = $this->remove_dupes($changes);

        //if type is the same and timestamp is the same
        return $changes;
    }

    /**
     * Get all activities that belong to a certain banner
     * Matching the id
     *
     * @param  string $name
     * @param  int @id
     * @param  int @team_id
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function get_banner_activities($id)
    {
        $matchThese = ['auditable_id' => $id, 'auditable_type' => 'App\\Banner'];

        return $this->auditing->where($matchThese)->orderBy('created_at', 'desc')->get();
    }

    /**
     * Compare the old fields state to the new one
     * @param $activity
     * @return array
     */
    public function diff_activities($activity)
    {
        return array_diff($activity->new, $activity->old);
    }

    /**
     *
     */
    public function remove_dupes($changes)
    {
        $unique = $changes->unique();

        return $unique->values()->all();
    }
}
