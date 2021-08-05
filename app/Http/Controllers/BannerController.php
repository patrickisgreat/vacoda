<?php

namespace App\Http\Controllers;

use Log;
use Gate;
use App\User;
use Debugbar;
use App\Offer;
use App\Banner;
use Carbon\Carbon;
use App\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Debug\Debug;
use Illuminate\Support\Facades\Auth;


class BannerController extends Controller
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
     * Show a list of banners.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        return view('components.banners.list');
    }

    /**
     * Show a list of archived banners.
     *
     * @return Response
     */
    public function archived(Request $request)
    {
        return view('components.banners.archived-list');
    }

    /**
     * Show a list of banners scheduled for auto-archive.
     *
     * @return Response
     */
    public function scheduled(Request $request)
    {
        $saturday = strtotime("next Saturday");
        $sixtyDaysAgo = date("Y-m-d H:i:s", $saturday - 86400 * 60);

        $scheduledBanners = Banner::where([
            ['end_date', '<=', $sixtyDaysAgo],
            ['team_id', $request->user()->currentTeam->id]
        ])->orderBy('end_date')->get();

        return view('components.banners.scheduled-list', ['scheduled' => $scheduledBanners]);
    }

    /**
     * Show, create, or edit a banner.
     *
     * @param  string $id
     * @return Response
     */
    public function show($id = '')
    {
        return view('components.banners.show', ['resource_id' => $id]);
    }

    public function true_up_offer_dates()
    {

        $banners = Banner::with('offer')->get()->filter( function($value, $key) {
            if (Carbon::parse($value->start_date)->lt(Carbon::parse($value->offer->start_date)) || Carbon::parse($value->end_date)->gt(Carbon::parse($value->offer->end_date))) {

                // echo "Banner Start Date " . Carbon::parse($value->start_date) . " compared to offer start date " . Carbon::parse($value->offer->start_date);

                // echo "<br />";
                // echo "<br />";

                return $value;
            }
        });

        $count = $banners->count();

        echo $count . "<b> Banners have dates outside of their related Offer Dates</b><br />";

        $banners->each( function($banner, $key) {
            echo "Correcting active dates for Banner ID ".$banner->id." with related Offer ID ". $banner->offer->id ." ". $banner->offer->name;
            echo "</br>";

            $offer = Offer::find($banner->offer->id);

            $earliest_start_date = Offer::find($banner->offer->id)->banners()->min('start_date');

            $latest_end_date = Offer::find($banner->offer->id)->banners()->max('end_date');

            echo "Changing start_date from ". Carbon::parse($offer->start_date) . " to " . $earliest_start_date;
            echo "<br />";

            echo "Changing end_date from ". Carbon::parse($offer->end_date) . " to " . $latest_end_date;
            echo "<br />";
            echo "<br />";

            $offer->start_date = $earliest_start_date;

            $offer->end_date = $latest_end_date;

            $save = $offer->save();

            //print_r($save);
            echo "<br />";
        });
    }
}
