<?php

namespace App\Jobs;

use Symfony\Component\HttpFoundation\File\File;
use App\Http\Controllers\FileUploadController;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Alert;
use Exception;
use App\Jobs\Job;

class ImportCategoriesJob extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    protected $error;

    /**
     * @var int
     */
    public $teamId;

    /**
     * @var array
     */
    public $spreadsheet_rows;


    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($teamId, $spreadsheet_rows)
    {
        $this->teamId = $teamId;

        $this->spreadsheet_rows = $spreadsheet_rows;
    }

    /**
     * Execute the job.
     *
     * @return true
     */
    public function handle(FileUploadController $uploadController)
    {
        try {
            $uploadController->createImportedCategories($this->teamId, $this->spreadsheet_rows);
        } catch (Exception $e) {
            $this->failed($this->job->getRawBody());
            $this->error = $e;
            throw new Exception($e);
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
        $alert->team_id = $this->teamId;
        $alert->failed_job_id = $this->job->getJobId();
        $alert->alert = json_encode($this->error);
        $alert->type = 'categories_import';
        $alert->label = 'Error Importing Categories';
        $alert->save();
    }
}
