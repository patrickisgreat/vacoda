<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\EtApiConfig;
use App\Impression;
use App\Category;
use Auth;
use Log;
use DB;

/**
 * Class ReportController
 * @package App\Http\Controllers\API
 */
class ReportController extends ResourceController
{

    /**
     * @var string
     */
    protected $de_name;

    /**
     * ReportController constructor.
     * @param Request $request
     */
    public function __construct()
    {
        $this->de_name = "VacodaTracking_Events";

        $this->rules = [
            'banner_ids'     => 'required_without:category_ids',
            'category_ids'   => 'required_without:banner_ids',
            'type'           => 'required',
            'start_date'     => 'required',
            'end_date'       => 'required',
            'trend_interval' => 'required_if:type,trending',
            'data_points'    => 'required',
        ];

        $this->middleware(function ($request, $next) {
            $this->request = $request;

            $this->fields = [
                'banner_ids'     => $this->request->banner_ids,
                'category_ids'   => $this->request->category_ids,
                'type'           => $this->request->type,
                'start_date'     => $this->request->start_date,
                'end_date'       => $this->request->end_date,
                'trend_interval' => $this->request->trend_interval,
                'data_points'    => $this->request->data_points,
            ];

            return $next($request);
        });
    }

    /**
     * Initial setter
     *
     * @return array|\Illuminate\Support\Collection|static
     */
    public function submit()
    {
        $this->doValidation();

        $banner_ids = $this->fields['banner_ids'];
        $start_date = Carbon::parse($this->fields['start_date'])->format('Y-m-d H:i:s');
        $end_date = Carbon::parse($this->fields['end_date'])->format('Y-m-d H:i:s');

        if ($this->fields['type'] === "trending" && !empty($this->fields['trend_interval'])) {
            $report = $this->get_trending_data($banner_ids);
            return $report;
        }
        //WHERE (date_field BETWEEN '2010-01-30 14:15:55' AND '2010-09-29 10:15:55')
        if (empty($banner_ids)) {
          $report = Impression::whereBetween('SentDate', [$start_date, $end_date])
                                ->selectRaw(
                                    'sum(SentCount) as SentCount,
                                            sum(BounceCount) as BounceCount,
                                            sum(ClickCount) as ClickCount,
                                            sum(OpenCount) as OpenCount,
                                            BannerID as BannerID,
                                            Campaign as Campaign,
                                            SentDate as SentDate,
                                            BannerName as BannerName'
                                )
                                ->groupBy('BannerID', 'Campaign')
                                ->get();
        } else {
          $report = Impression::whereIn('BannerID', $banner_ids)
                                ->whereBetween('SentDate', [$start_date, $end_date])
                                ->selectRaw(
                                    'sum(SentCount) as SentCount,
                                            sum(BounceCount) as BounceCount,
                                            sum(ClickCount) as ClickCount,
                                            sum(OpenCount) as OpenCount,
                                            BannerID as BannerID,
                                            Campaign as Campaign,
                                            SentDate as SentDate,
                                            BannerName as BannerName'
                                )
                                ->groupBy('BannerID', 'Campaign')
                                ->get();
        }

        Log::info('PRE FILTERED REPORT');
        Log::info($report);

        if (!empty($this->fields['category_ids'])) {
            $report = $this->filter_by_category($report);
        }

        $report = $this->build_report($report);
        Log::info('right before send');
        Log::info($report);
        return $report;
    }


    /**
     * Filter by category cell labels
     *
     * @param $report
     * @return \Illuminate\Support\Collection|static
     */
    public function filter_by_category($report)
    {
        $category_cell_labels = Category::whereIn('id', $this->fields['category_ids'])->get();

        $cat_cell_labels = [];

        foreach ($category_cell_labels as $cat) {
            $cat_cell_labels[] = $cat->cell_label;
        }

        $report = collect($report);

        $report = $report->filter(function ($val, $key) use ($cat_cell_labels) {
            if (in_array($val->Campaign, $cat_cell_labels)) {
                return $val;
            }
        });

        return $report->values();
    }


    /**
     * Gets Trending Data
     *
     * Could be more Dry
     * @param $banner_ids
     * @return array
     */
    public function get_trending_data($banner_ids)
    {
        Log::info($this->fields['trend_interval']);

        //we want to add the send colum for all rows in 2017, 2018
        if ($this->fields['trend_interval'] === "year") {
            $report = DB::select("SELECT any_value(BannerID) AS BannerID,
                                          any_value(BannerName) AS BannerName,
                                          any_value(Campaign) AS Campaign,
                                          SUM(SentCount) AS SentCount,
                                          SUM(BounceCount) AS BounceCount,
                                          SUM(ClickCount) AS ClickCount,
                                          YEAR(SentDate) AS SentDate,
                                          SUM(SentCount) AS SentCount,
                                          SUM(OpenCount) AS OpenCount
                                          FROM impressions
                                          WHERE BannerID IN (".implode(',', $banner_ids).")
                                          GROUP BY YEAR(SentDate)");
        }

        if ($this->fields['trend_interval'] === "quarter") {
        }

        if ($this->fields['trend_interval'] === "month") {
            $report = DB::select("SELECT any_value(BannerID) AS BannerID,
                                          any_value(BannerName) AS BannerName,
                                          any_value(Campaign) AS Campaign,
                                          SUM(SentCount) AS SentCount,
                                          SUM(BounceCount) AS BounceCount,
                                          SUM(ClickCount) AS ClickCount,
                                          MONTHNAME(SentDate) AS SentDate,
                                          SUM(SentCount) AS SentCount,
                                          SUM(OpenCount) AS OpenCount
                                          FROM impressions
                                          WHERE BannerID IN (".implode(',', $banner_ids).")
                                          GROUP BY MONTH(SentDate)");
        }

        if ($this->fields['trend_interval'] === "week") {
            $report = DB::select("SELECT any_value(BannerID) AS BannerID,
                                          any_value(BannerName) AS BannerName,
                                          any_value(Campaign) AS Campaign,
                                          SUM(SentCount) AS SentCount,
                                          SUM(BounceCount) AS BounceCount,
                                          SUM(ClickCount) AS ClickCount,
                                          WEEK(SentDate) AS SentDate,
                                          SUM(SentCount) AS SentCount,
                                          SUM(OpenCount) AS OpenCount
                                          FROM impressions
                                          WHERE BannerID IN (".implode(',', $banner_ids).")
                                          GROUP BY WEEK(SentDate)");
        }

        if (!empty($this->fields['category_ids'])) {
            $report = $this->filter_by_category($report);
        }

        $report = $this->build_report($report);

        return $report;
    }


    /**
     * Build the final Array
     *
     * @param $report
     * @return array
     */
    public function build_report($report)
    {
        $report = collect($report);

        $report = $report->map(function ($send, $key) {
            if ($this->fields['type'] === "trending") {
                $send = (array) $send;
                Log::info('in report builder');
                Log::info($send);
            }

            $result = [
                'banner_id'   => $send['BannerID'],
                'banner_name' => $send['BannerName'],
                'category'    => $send['Campaign'],
            ];

            if ($this->fields['type'] !== "summary") {
                $result['date'] = $send['SentDate'];
            }

            if (in_array('sent', $this->fields['data_points'])) {
                $result['sent'] = $send['SentCount'];
            }

            if (in_array('bounce', $this->fields['data_points']) && isset($send['BounceCount'])) {
                $result['bounce'] = round(($send['BounceCount'] / $send['SentCount']) * 100, 2) . '%';
            }

            if (in_array('open', $this->fields['data_points'])) {
                $result['open'] = round(($send['OpenCount'] / ($send['SentCount'] - $send['BounceCount'])) * 100, 2) . '%';
            }

            if (in_array('click', $this->fields['data_points']) && isset($send['ClickCount'])) {
                $result['click'] = round(($send['ClickCount'] / $send['OpenCount']) * 100, 2) . '%';
            }

            return $result;
        });
        Log::info('FINAL report');
        Log::info($report->toArray());
        return $report->toArray();
    }
}
