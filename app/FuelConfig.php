<?php

namespace App;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use FuelSdk\ET_Client;
use App\Credential;
use Log;

class FuelConfig extends ET_Client
{

    /**
     * @var
     */
    protected $teamId;


    /**
     * FuelConfig constructor.
     *
     * @param $companyId
     */
    public function __construct($team_id)
    {
        $this->team_id = $team_id;
        parent::__construct();
    }


    /**
     * Override from Fuel SDK in Vendor
     *
     * @return mixed
     */
    public function getConfig()
    {
        $credentials = Credential::where('team_id', $this->team_id)->get()->toArray();
        unset($credentials[0]['created_at'], $credentials[0]['updated_at'], $credentials[0]['id'], $credentials[0]['team_id']);

        return $credentials[0];
    }
}
