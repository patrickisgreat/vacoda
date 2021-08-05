<?php

namespace App\Jobs;

use App\Http\Controllers\FileUploadController;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Jobs\Job;
use Log;
use App\EtApiConfig;
use App\Alert;

class CreateBannerInExactTarget extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    public $data;
    public $team_id;
    public $error;
    protected $send;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data, $team_id)
    {
        $this->data = $data;
        $this->team_id = $team_id;
        $this->error = null;
        $this->job_id = $this->job->getJobId();
    }

    /**
     * calls in the EtApi
     *
     * @return mixed
     */
    public function etConnect()
    {
        Log::info('ET connect');

        //return \App::make('digitaladditive\ExactTargetLaravel\ExactTargetLaravelApi');
        return new EtApiConfig($this->team_id);
    }


    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if ($this->data) {
            Log::info('handle ET banner create job');
            unset($this->data['offer']);
            unset($this->data['banner_image']);

            //for easy mode QA
            if ($this->data['name'] == 'Testing Alerts') {
                $this->send = $this->etConnect()->createRow('NonExistentDE', $this->data);
            } else {
                $this->send = $this->etConnect()->createRow(env('BANNERS_DE', 'Banners'), $this->data);
            }

            if ($this->send['responseCode'] != "200") {
                $this->failed($this->job->getRawBody());
                throw new Exception('The CreateBanner queued job has failed. The error has been logged');
            }

        }
    }

    /**
     * Handle a job failure.
     *
     * @return void
     */
    public function failed($job_payload)
    {
        $alert = new Alert();
        $alert->job_data = $job_payload;
        $alert->team_id = $this->team_id;
        $alert->entity_id = $this->data['id'];
        $alert->alert = $this->send;
        $alert->type = 'sfmc_banner';
        $alert->label = 'Error Updating Banner ' . $alert->entity_id . ' in SFMC';

        $alert->save();
    }
}
