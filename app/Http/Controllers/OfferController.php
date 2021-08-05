<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Permission;
use Log;
use Gate;
use Debugbar;
use Symfony\Component\Debug\Debug;

class OfferController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show a list of offers.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        // here you can test that roles are being registered as expected
        //like this
//        $test = $request->user()->can('view_offers');
////        //$test2 = $request->user()->can('view_banners');
//        dd($test);
//        //dd($test2);
        return view('components.offers.list');
    }


    /**
     * Show a list of archived offers.
     *
     * @return Response
     */
    public function archived(Request $request)
    {
        return view('components.offers.archived-list');
    }

    /**
     * Show, create, or edit an offer.
     *
     * @param  string $id
     * @return Response
     */
    public function show($id = '')
    {
        return view('components.offers.show', ['resource_id' => $id]);
    }

    /**
     * List banners that belong to an offer.
     *
     * @return Response
     */
    public function banners()
    {
        return view('components.offers.banner-list');
    }
}
