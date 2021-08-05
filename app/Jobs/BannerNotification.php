<?php
namespace App\Jobs;

use App\Http\Controllers\FileUploadController;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Jobs\Job;
use App\Banner;
use Mail;
use Log;

class BannerNotification extends Job implements ShouldQueue
{

    //the banner id
    protected $id;

    //the updated banner status
    protected $status;

    //the tenant specific URL
    protected $url;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($id, $status, $url)
    {
        $this->id = $id;
        $this->url = $url;
        $this->status = $status;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Log::info('handle banner notification');

        // find the user associated to the banner
        $banner = Banner::where('id', $this->id)->firstOrFail();
        Log::info('banner');
        Log::info($banner);

        $user = $banner->creator()->firstOrFail();
        Log::info('user');
        Log::info($user);

        $url = $this->url;

        // send them an email
        Mail::send('emails.banner_notification',
            ['user' => $user, 'status' => $this->status, 'banner' => $banner, 'url' => $url],
            function ($m) use ($user) {
                $m->to($user->email, $user->name)->subject('Your Banner Status has Changed!');
                // for unit tests -- to verify the closure / callback fired.
                Log::info('Banner Status Changed');
            }
        );
    }
}
