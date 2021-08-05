<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Jobs\Job;
use App\Banner;
use App\EtApiConfig;
use App\Alert;
use Log;

class UploadBannerImageToExactTarget extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    public $data;

    public $filePath;

    public $fileName;

    public $team_id;

    public $sfmc_image_url;

    public $error;


    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($filePath, $fileName, $team_id, $data)
    {
        $this->filePath = $filePath;
        $this->fileName = $fileName;
        $this->team_id = $team_id;
        $this->data = $data;
        $this->sfmc_image_url = null;
        $this->error = null;
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

    public function upload_file_via_ftp()
    {
        if ($this->filePath) {
            //THDm @todo make this not static
            if ($this->team_id == 1) {
                //DA
                $host = env('DA_FTP_HOST', 'ftp1.exacttarget.com');
                $userName = env('DA_FTP_UN');
                $userPass = env('DA_FTP_PW');
            }

            if ($this->team_id == 3) {
                $host = env('THD_FTP_HOST', 'ftp1.exacttarget.com');
                $userName = env('THD_FTP_UN');
                $userPass = env('THD_FTP_PW');
            }

            $remoteFilePath = $this->fileName;
            $localFilePath = $this->filePath;
            $upload = $this->etConnect()->it_uploads_a_file_via_ftp($host, $userName, $userPass, $remoteFilePath,
                $localFilePath);

            return $upload;
        }

    }

    public function upload_to_content_builder()
    {
        $base64EncImage = base64_encode(file_get_contents($this->filePath));
        //$base64EncImage = "ImgStuff";
        $ext = pathinfo($this->filePath, PATHINFO_EXTENSION);
        $json = json_encode([
            "name" => $this->fileName,
            "assetType" => [
                "name" => $ext,
                "id" => "28"
            ],
            // this maps to email folder in THD account
            // we'll need to determine which folder(s) to use or if it even matters
            "category" => [
                "id" => "53170"
            ],
            "file" => $base64EncImage
        ]);

        $transfer = $this->etConnect()->create_content_builder_asset($json);

        Log::info($transfer);

        if (isset($transfer['responseBody'])) {
            $url = $transfer['responseBody']->fileProperties->publishedURL;
            $this->set_image_url($url);
        }

        return $transfer;
    }

    public function get_image_url($portfolioObj)
    {

        $image = $this->etConnect()->it_gets_an_asset_soap($portfolioObj->results[0]->Object->CustomerKey);

        return $image->results[0]->FileURL;
    }

    public function set_image_url($url)
    {

        $banner = Banner::where('id', '=', $this->data['id'])->firstOrFail();

        $banner->sfmc_image_url = $url;

        $banner->save();

        $banner_for_sfmc = $banner->toArray();
        unset($banner_for_sfmc['categories']);

        $this->etConnect()->upsertRow('id', $banner->id, $banner_for_sfmc, env('BANNERS_DE', 'Banners'));
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try {
            $content = $this->upload_to_content_builder();
        } catch (Exception $e) {
            throw new Exception('The Upload Banner Image queued job has failed. The error has been logged');
        }

    }

    /**
     * Handle a job failure.
     *
     * @return void
     */
    public function failed()
    {
        // $alert = new Alert();

        // $alert->team_id = $this->team_id;
        // $alert->entity_id = $this->data['id'];
        // $alert->failed_job_id = $this->job->getJobId();
        // $alert->alert = null;
        // $alert->type = 'sfmc_banner';
        // $alert->label = 'Error Uploading Banner ' . $alert->entity_id . ' Image to Portfolio in SFMC';

        // $alert->save();
    }
}
