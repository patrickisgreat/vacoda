<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Foundation\Bus\DispatchesJobs;

use App\Jobs\AutoArchiveNotification;
use App\Banner;
use App\User;
use App\Team;
use Log;

class AutoArchiveNotify extends Command
{
    use DispatchesJobs;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'auto-archive-notify';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Notify users of banners scheduled for auto archive';

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
        echo "--- Auto Archive Notify - Start ---\n";

        $saturday = strtotime("next Saturday");
        $sixtyDaysAgo = date("Y-m-d H:i:s", $saturday - 86400 * 60);

        $scheduledBanners = Banner::where([
            ['end_date', '<=', $sixtyDaysAgo],
        ])->get()->groupBy('team_id');

//        $daUsersToNotify = Team::find(1)->users()->wherePivot('role', 'auto-archive-notify')->get();

        $thdUsersToNotify = Team::find(3)->users()->wherePivot('role', 'auto-archive-notify')->get();

        foreach ($scheduledBanners as $team => $banners) {
            $count = $banners->count();

            if ($team === 1) {
                // DA
//                echo "Notifying DA\n";
//                foreach ($daUsersToNotify as $user) {
//                    echo "Notifying " . $user->name . "\n";
//                    $this->dispatch(new AutoArchiveNotification($count, $user));
//                }
            } else if ($team === 3) {
                // THD
                echo "Notifying THD\n";

                foreach ($thdUsersToNotify as $user) {
                    echo "Notifying " . $user->name . "\n";
                    $this->dispatch(new AutoArchiveNotification($count, $user));
                }
            }
        }

        echo "--- Auto Archive Notify - Stop ---\n";
    }
}
