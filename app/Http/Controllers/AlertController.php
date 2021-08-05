<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Artisan;
use App\Jobs\UpdateBannerInExactTarget;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Status;
use App\Banner;
use App\Offer;
use App\Alert;
use App\Team;
use Log;

class AlertController extends Controller
{

    /**
     * AlertController constructor.
     */
    public function __construct(Alert $model)
    {
        $this->resource = $model;

        $this->middleware(function ($request, $next) {
            $this->request = $request;

            // because null user in artisan session breaks artisan route:list
            $this->team_id = null;

            if ($this->request->user()) {
                $this->team_id = $this->request->user()->currentTeam->id;
            }

            $this->fields = [
                'team_id' => $this->request->team_id,
                'type'    => $this->request->type,
                'alert'   => $this->request->alert
            ];
            
            return $next($request);
        });
    }


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($teamId = null)
    {
        if ($teamId) {
            $team_id = $teamId;
        } else {
            $team_id = $this->team_id;
        }

        $alerts = $this->resource->orderBy('created_at', 'desc')->where('team_id', $team_id)->get();

        return $alerts;
    }

    public function listView()
    {
        $list = $this->index();

        return view('components.alerts.alerts-list', $list);
    }

    /**
     * Store a newly created resource.
     *
     * @return Response
     */
    public function store()
    {
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
     * Remove the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $alert_to_archive = $this->resource->findOrFail($id);

        try {
            $destroyed = $alert_to_archive->delete() ? 'true' : 'false';
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
        return $this->resource->findOrFail($id);
    }


    /**
     * Test Alerts
     * @param $step
     */
    public function test_alerts($step)
    {
        if ($step == "1") {
            return  $this->generate_alert();
        }

        if ($step == "2") {
            return $this->clear_alert();
        }
    }

    /**
     * Creates a test banner and syncs it to SFMC
     * with a non existent DE name
     * to generate an alert
     *
     *
     *
     */
    public function generate_alert()
    {
        //pull an offer to attach the banner to
        $offer = Offer::where('id', 1)->firstOrFail();

        //create banner with min required fields
        $offer->banners()->save(new Banner([
            'creator_id'         => 1,
            'team_id'            => 1,
            'template_id'        => 1,
            'theme_id'           => 1,
            'name'               => 'Testing Alerts',
            'description'        => 'In risus turpis, tempus ac mollis eget, cursus nec erat. Duis lorem arcu, consequat sed urna ac, bibendum suscipit purus.',
            'headline'           => 'Banner Headline',
            'headline_font_size' => 34,
            'body'               => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sit amet ultricies massa.',
            'body_font_size'     => 13,
            'cta'                => 'SHOP NOW ›',
            'url'                => 'http://example.com',
            'status'             => Status::pending,
        ]));

        //pull test banner
        $banner = Banner::all()->last();

        //dispatch failing job
        return $this->dispatch(new UpdateBannerInExactTarget($banner->toArray(), 1, true));
    }

    /**
     * Clears out the testing Alert
     *
     *
     *
     */
    public function clear_alert()
    {

        //get the most recent failed job ID
        $failed_job = DB::table('failed_jobs')->orderBy('failed_at', 'desc')->first();

        $failed_job = (object) $failed_job;

        $failed_job_payload = json_decode($failed_job->payload);

        $failed_job_command = unserialize($failed_job_payload->data->command);

        $failed_job_command->test_flag = false;

        $failed_job_command = serialize($failed_job_command);

        $failed_job_payload->data->command = $failed_job_command;

        $failed_job_payload = json_encode($failed_job_payload);

        $failed_job->payload = $failed_job_payload;

        //most recent alert
        $most_recent_alert = Alert::all()->last();

        $most_recent_alert->job_data = $failed_job->payload;

        $most_recent_alert->save();

        DB::update('update failed_jobs set payload = ? where id= ?', [$failed_job->payload, $failed_job->id]);

        //push the failed job back onto the queue -- without the flag it should clear the alert
        Artisan::call('queue:retry', ['id' => [$failed_job->id]]);
    }
}
