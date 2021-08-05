<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Jobs\UploadBannerImageToExactTarget;

use Log;
use Image;
use App\Banner;
use App\BannerImage;
use GuzzleHttp\Psr7;
use Laravel\Spark\Token as Token;
use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Foundation\Bus\DispatchesJobs as DispatchesJobs;

class ExportBannerImage extends Job implements ShouldQueue
{
    use InteractsWithQueue, DispatchesJobs;

    // environment
    protected $environment;

    // banner id
    protected $id;

    // banner
    protected $banner;

    // screenshot service url
    protected $screenshotUrl = "http://162.242.245.199";

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($id)
    {
        Log::info('ExportBannerImage@__construct');
        $this->id = $id;
        $this->banner = Banner::findOrFail($id);
        $this->screenshotUrl = env('SCREENSHOT_URL', 'http://162.242.245.199');
        $this->environment = \App::environment();
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Log::info('------------------------------');
        Log::info('Start ExportBannerImage@handle');

        $id = $this->id;
        Log::info('Banner ID:');
        Log::info($id);

        $apiUrl = url("api/banner/${id}/html");

        if ($this->environment == "local" || $this->environment == "testing" || $this->environment == "qa") {
            $apiUrl = "http://vacoda.ngrok.io/api/banner/${id}/html";
        }

        Log::info('API Url:');
        Log::info($apiUrl);

        $apiToken = Token::where('name', 'vacoda-screenshot')->firstOrFail()->token;
        Log::info('API Token:');
        Log::info($apiToken);

        $headers = "Authorization=Bearer ${apiToken}";
        Log::info('Request Headers:');
        Log::info($headers);

        $newImageName = uniqid() . '.png';
        Log::info('New Image Name:');
        Log::info($newImageName);

        $newImagePath = public_path() . '/uploads/banner-images/';
        Log::info('New Image Path:');
        Log::info($newImagePath);

        $client = new HttpClient();
        Log::info('Sending Request');

        try {
            $client->get($this->screenshotUrl, [
                'query' => [
                    'url'          => $apiUrl,
                    'headers'      => $headers,
                    'selectorCrop' => 'true',
                    'selector'     => '.banner-html',
                ],
                'sink'  => $newImagePath . $newImageName
            ]);

            $oldFile = $this->banner->banner_image()->first();

            if ($oldFile) {
                $oldFile->delete();
            }

            $newImage = new BannerImage(['name' => $newImageName]);
            $this->banner->banner_image()->save($newImage);

            $exactTargetData = $this->banner->toArray();

            $this->dispatch(new UploadBannerImageToExactTarget($this->banner->banner_image->path,
                $this->banner->banner_image->name, $this->banner->team_id, $exactTargetData));

        } catch (RequestException $e) {
            Log::info('Request Error');

            Log::info('Request:');
            echo Psr7\str($e->getRequest());
            if ($e->hasResponse()) {
                Log::info('Error:');
                echo Psr7\str($e->getResponse());
            }
        }

        Log::info('End ExportBannerImage@handle');
        Log::info('----------------------------');
    }
}
