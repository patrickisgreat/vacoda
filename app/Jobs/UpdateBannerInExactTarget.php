<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\EtApiConfig;
use App\Jobs\Job;
use App\Alert;
use Log;

use Exception;

class UpdateBannerInExactTarget extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    public $job_payload;
    public $alert_type;
    public $test_flag;
    public $team_id;
    public $error;
    public $batch;
    public $data;
    public $send;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data, $team_id, $test_flag=false, $batch=false)
    {
        $this->alert_type = 'sfmc_banner';
        $this->test_flag = $test_flag;
        $this->job_payload = null;
        $this->team_id = $team_id;
        $this->data = $data;
        $this->error = null;
        $this->batch = $batch;
    }

    /**
     * calls in the EtApi
     *
     * @return mixed
     */
    public function etConnect()
    {
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
        //makes logs easier to reason about
        Log::info('Updating Banner in Exact Target:');
        if ($this->data == true && $this->test_flag == true && $this->batch == true) {

            //upsert rowset with non Existent DE to generate a test alert
            $this->send = $this->etConnect()->upsertRowSet(
                $this->data,
                'NonExistentDE'
            );
        } elseif ($this->data == true && $this->test_flag == false && $this->batch == true) {

            //upsert rowset
            $this->send = $this->etConnect()->upsertRowSet(
                $this->data,
                env('BANNERS_DE', 'Banners')
            );
        } elseif ($this->data == true && $this->test_flag == true && $this->batch == false) {

            //upsert single row to non Existent DE to generate a test alert
            $this->send = $this->etConnect()->upsertRow(
                'id',
                $this->data['id'],
                $this->data,
                'NonExistentDE'
            );
        } elseif ($this->data == true && $this->test_flag == false && $this->batch == false) {

            //upsert a single row
            $this->send = $this->etConnect()->upsertRow(
                'id',
                $this->data['id'],
                $this->data,
                env('BANNERS_DE', 'Banners')
            );
        }


        if (is_string($this->send)) {
            Log::info($this->send);
            $this->send = json_decode($this->send);
            if (property_exists($this->send, 'errorcode')) {
                $this->failed($this->job->getRawBody());
                throw new Exception('The UpdateBanner queued job has failed. The error has been logged');
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
        $alert->alert = json_encode($this->send);
        $alert->type = 'sfmc_banner';
        $alert->label = 'Error Updating Banner ' . $alert->entity_id . ' in SFMC';
        $alert->save();
    }
}
