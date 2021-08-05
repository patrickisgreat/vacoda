<?php

namespace App\Providers;

use App\Jobs\UpdateBannerInExactTarget;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Queue;
use Illuminate\Queue\Events\JobProcessed;
use Illuminate\Queue\Events\JobProcessing;
use Illuminate\Queue\Events\JobFailed;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;
use App\EtApiConfig;
use App\Banner;
use App\Status;
use App\Alert;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Route::singularResourceParameters(false);

        Queue::before(function (JobProcessing $event) {
            // $event->connectionName
            // $event->job
            // $event->job->payload()
        });

        Queue::failing(function (JobFailed $event) {

        });

        Queue::after(function (JobProcessed $event) {
            if (strpos($event->job->payload()['data']['commandName'], 'CreateBannerInExactTarget')) {
                $banner_data = unserialize($event->job->payload()['data']['command']);
                $banner = Banner::where('id', '=', $banner_data->data['id'])->firstOrFail();
                $banner->status = Status::approved;
                $banner->save();
            }

            //in case we need to hook here or with other commands leaving as reference
            if (strpos($event->job->payload()['data']['commandName'], 'UploadBannerImageToExactTarget')) {

            }

            //if the job exists in alerts table remove it
            $banner_data = unserialize($event->job->payload()['data']['command']);

            // if an alert with this entity ID exists - get all alerts with this entity ID
            // loop through them and see which payload matches the current payload
            if (isset($banner_data->data) && isset($banner_data->data['id']) && Alert::where('entity_id', '=', $banner_data->data['id'])->exists()) {
                $alerts = Alert::where('entity_id', '=', $banner_data->data['id'])->where('team_id', $banner_data->data['team_id'])->get();

                $alerts->each( function($alert, $key) use ($event) {
                    if ($alert->job_data === json_encode($event->job->payload())) {
                        //remove alert
                        $alert->delete(); //look this up
                    }
                });
            }
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
