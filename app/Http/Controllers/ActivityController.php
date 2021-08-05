<?php

namespace App\Http\Controllers;

use App\Repositories\AuditTrailRepository as AuditTrailRepository;
use OwenIt\Auditing\Auditing;
use Illuminate\Http\Request;
use App\Http\Requests;
use Carbon\Carbon;
use Log;

class ActivityController extends Controller
{

    /**
     * @var
     */
    protected $auditing;

    /**
     * @var Request
     */
    protected $request;


    /**
     * @var
     */
    protected $team_id;


    /**
     * ActivityController constructor.
     * @param AuditTrailRepository $auditing
     */
    public function __construct(AuditTrailRepository $auditing)
    {
        $this->auditing = $auditing;

        $this->middleware(function ($request, $next) {
            $this->request = $request;

            $this->team_id = $this->request->user()->currentTeam->id;

            if ($this->request->user()) {
                $this->team_id = $this->request->user()->currentTeam->id;
            }

            return $next($request);
        });
    }


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return $this->auditing->list($this->team_id);
    }

    public function listView()
    {
        $list = $this->index();

        return view('components.activity.list', $list);
    }

    /**
     * Update the last read activity timestamp.
     *
     * @param  Request  $request
     * @return Response
     */
    public function updateLastSeenActivity(Request $request)
    {
        $request->user()->forceFill([
            'last_seen_activity_at' => Carbon::now(),
        ])->save();
    }

    public function get_banner_activities($id)
    {
        return $this->auditing->build_activities($id);
    }
}
