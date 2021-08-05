<?php

namespace App\Jobs;

use App\Jobs\Job;
use Symfony\Component\HttpFoundation\File\File;
use App\Http\Controllers\FileUploadController;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Option;
use App\Offer;
use App\Team;
use App\Alert;
use Exception;
use Log;


class ImportOffersJob extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    /**
     * @var int
     */
    public $teamId;

    /**
     * @var array
     */
    public $spreadsheet_rows;

    /**
     * @var int
     */
    public $userId;

    public $error;


    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($teamId, $spreadsheet_rows, $userId)
    {
        $this->teamId = $teamId;
        $this->spreadsheet_rows = $spreadsheet_rows;
        $this->userId = $userId;
    }

    /**
     * Execute the job.
     *
     * @return true
     */
    public function handle()
    {
        $all_rows_from_spreadsheet = collect($this->spreadsheet_rows);

        $team = Team::where('id', $this->teamId)->first();
        $userId = $this->userId;

        $all_rows_from_spreadsheet->each(function ($offer) use ($team, $userId) {
            try {
                $department = Option::where('abbreviation', $offer->department)->firstOrFail();

                $new_offer = new Offer();
                $fill = $offer->toArray();
                $new_offer->fill($fill);

                $new_offer->team_id = $team->id;
                $new_offer->department_id = $department->id;
                $new_offer->creator_id = $userId;

                $new_offer->save();

            } catch (Exception $e) {
                $this->error = $e;
                throw new Exception($e);
            }
        });
    }

    /**
     * Handle a job failure.
     *
     * @return void
     */
    public function failed()
    {
        $alert = new Alert();

        $alert->team_id = $this->teamId;
        $alert->alert = json_encode($e);
        $alert->type = 'offer_import';
        $alert->label = 'There was an Error Importing Offers';

        $alert->save();
    }
}
