<?php

namespace App;

use digitaladditive\ExactTargetLaravel\ExactTargetLaravelApi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Credential;
use App\FuelConfig;
use Log;

class EtApiConfig extends ExactTargetLaravelApi
{

    protected $teamId;

    public function __construct($team_id)
    {
        $this->team_id = $team_id;
        parent::__construct();
    }

    public function getConfig()
    {
        $credentials = Credential::where('team_id', $this->team_id)->get()->toArray();
        $this->fuel = new FuelConfig($this->team_id);

        return $credentials[0];
    }
}
