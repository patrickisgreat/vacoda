<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;
use Log;

class AutoArchiveNotification extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    protected $count;
    protected $user;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($count, $user)
    {
        $this->count = $count;
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $user = $this->user;

        // send an email
        Mail::send('emails.auto_archive_notification',
            ['user' => $user, 'count' => $this->count],
            function ($m) use ($user) {
                $m->to($user->email, $user->name)->subject('Banners scheduled for auto-archive');
                Log::info('Auto-Archive Notification Send');
            }
        );
    }
}
