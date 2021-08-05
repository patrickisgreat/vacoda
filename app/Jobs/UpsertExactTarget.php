<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Jobs\Job;
use App\EtApiConfig;
use Log;

class UpsertExactTarget extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    public $data;

    public $team_id;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data, $team_id)
    {
        $this->data = $data;
        $this->team_id = $team_id;
    }

    /**
     * Call in EtApi
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
        $this->etConnect()->upsertRowset($this->data);
    }
}
