<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\EtApiConfig;


/**
 * Class DevAuditTrailController
 * @package App\Http\Controllers\API
 */
class DevAuditTrailController extends ResourceController
{
    protected $team_id;
    protected $de_name;

    /**
     * DevAuditTrailController constructor.
     */
    public function __construct()
    {
        $this->de_name = env('BANNERS_DE', 'VacodaBannersTest');
        
        $this->middleware(function ($request, $next) {
            $this->request = $request;

            if ($this->request->user()) {
                $this->team_id = $this->request->user()->currentTeam->id;
            }

            return $next($request);
        });
    }


    /**
     * Get a list of all records in the Banners DE
     */
    public function list() {
        $etConnect = new EtApiConfig($this->team_id);
        return $this->arrangeData($etConnect->getRows($this->de_name));
    }

    /**
     * Rearranges this DE's data
     *
     * @param $data
     * @return array
     */
    public function arrangeData($data)
    {
        //restructure for easy views
        $newArray = [];
        foreach($data as $k => $v) {
            foreach($v->Properties->Property as $key => $val) {
                $newArray[$k][$val->Name] = $val->Value;
            }
        }
        return $newArray;
    }
}
