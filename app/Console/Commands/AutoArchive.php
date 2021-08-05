<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Foundation\Bus\DispatchesJobs;

use Log;
use App\Status;
use App\Banner;
use OwenIt\Auditing\Auditing as Auditing;
use App\Jobs\UpdateBannerInExactTarget;

class AutoArchive extends Command
{


    use DispatchesJobs;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'auto-archive';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Archive banners 60 days past active end date';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        Log::info('-------------------------');
        Log::info('Starting Auto-Archive Job');
        Log::info('-------------------------');

        $sixtyDaysAgo = date("Y-m-d H:i:s", time() - 86400 * 60);

        $banners = Banner::where([
            ['end_date', '<=', $sixtyDaysAgo],
        ])->get();

        Log::info('---------------');
        Log::info($banners->count() .' Old Banners');
        Log::info('---------------');

        //Log::info($banners);

        if ($banners->count() > 0) {
            foreach($banners as $banner) {
                Log::info('Archiving Banner '. $banner->id .' for Team '. $banner['team_id']);

                $banner->status = Status::archived;
                $banner->auto_archived = 1;
                $statusUpdated = $banner->save() ? 'true' : 'false';
                Log::info('Status Updated to Archived:');
                Log::info($statusUpdated);

                $deleted = $banner->delete() ? 'true' : 'false';
                Log::info('Soft Deleted:');
                Log::info($deleted);
            }

            $teamBanners = $banners->groupBy('team_id');

            Log::info('Banners by Team:');
            Log::info($teamBanners);

            $formattedTeamBanners = [];
            foreach($teamBanners as $teamId => $banners) {
                foreach($banners as $key => $banner) {
                    $formattedTeamBanners[$teamId][$key]['keys'] = [
                        "id" => $banner['attributes']['id']
                    ];
                    $formattedTeamBanners[$teamId][$key]['values'] = $banner['attributes'];
                }

                Log::info('Formatted Banners for SFMC Sync on Team '. $teamId .':');
                Log::info($formattedTeamBanners[$teamId]);

                Log::info('Dispatching Batch SFMC Update for Team '. $teamId);
                $this->dispatch(new UpdateBannerInExactTarget($formattedTeamBanners[$teamId], $teamId, false, true));
            }
        }

        Log::info('-------------------------');
        Log::info('Auto-Archive Job Complete');
        Log::info('-------------------------');
    }
}
