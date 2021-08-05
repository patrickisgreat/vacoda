<?php

namespace App\Console\Commands;

use Illuminate\Foundation\Bus\DispatchesJobs;
use OwenIt\Auditing\Auditing as Auditing;
use Illuminate\Console\Command;
use App\EtApiConfig;
use App\Impression;
use Carbon;
use Log;

class SyncImpressionTracking extends Command
{
    use DispatchesJobs;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sync-impressions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Syncs data from Impression tracking DEs in Vacoda';

    protected $team_id;

    protected $de_name;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->team_id = 3;
        $this->de_name = "VacodaTracking_Events";
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
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        Log::info('-------------------------');
        Log::info('Starting Sync Impression Tracking Job');
        Log::info('-------------------------');

        //get the most recent send record
        $most_recent_send = Impression::latest('created_at')->first();
        $incremental = false;
        if ($most_recent_send !== null) {
            //get data that hasn't been stored yet
            $impression_data = $this->etConnect()->getRows($this->de_name, 'StoredDate', 'greaterThan', $most_recent_send->created_at);
            $incremental = true;
        } else {
            $impression_data = $this->etConnect()->getRows($this->de_name);
        }

        //add to db
        if ($incremental) {
            foreach ($impression_data as $data) {
                if (isset($data->Properties->Property)) {
                    $impression = new Impression();
                    foreach ($data->Properties->Property as $k => $v) {
                        if ($v->Name != "_CustomObjectKey") {
                            $impression->{$v->Name} = $v->Value;
                        }
                    }
                    $impression->save();
                }
            }
        } else {
            foreach ($impression_data as $data) {
                foreach ($data as $k => $v) {
                    if (isset($v->Properties->Property)) {
                        $impression = new Impression();
                        foreach ($v->Properties->Property as $k => $v) {
                            if ($v->Name != "_CustomObjectKey") {
                                $impression->{$v->Name} = $v->Value;
                            }
                        }
                        $impression->save();
                    }
                }
            }
        }


        Log::info('-------------------------');
        Log::info('Sync Job Complete');
        Log::info('-------------------------');
    }
}
