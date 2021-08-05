<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\EtApiConfig;
use App\Impression;
use Auth;
use Log;

class ImpressionController extends ResourceController
{
    protected $de_name;

    /**
     * ImpressionRepository constructor.
     */
    public function __construct()
    {
        $this->de_name = "VacodaTracking_Events";

        $this->middleware(function ($request, $next) {
            $this->request = $request;

            $this->fields = [
                'banner_ids'     => $this->request->banner_ids,
                'categories'     => $this->request->category_ids,
                'report_type'    => $this->request->type,
                'start_date'     => $this->request->start_date,
                'end_date'       => $this->request->end_date,
                'trend_interval' => $this->request->trend_interval,
                'data_points'    => $this->request->data_points

            ];

            return $next($request);
        });
    }


    //starter method to be broken out then coded to an interface
    public function build_report()
    {

    }


}