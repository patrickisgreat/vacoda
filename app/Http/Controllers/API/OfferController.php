<?php

namespace App\Http\Controllers\API;

use App\Offer;
use Illuminate\Http\Request;
use Log;

class OfferController extends ResourceController
{

    protected $team_id;

    public function __construct(Offer $model)
    {
        $this->resource = $model;

        $this->rules = [
            'name'               => 'required|max:255',
            'description'        => 'required|max:255',
            'owner_id'           => 'integer',
            'department_id'      => 'integer',
            'legal_display_copy' => 'string',
            'external_offer_id'  => 'max:255',
            'start_date'         => 'date_format:m/d/Y',
            'end_date'           => 'date_format:m/d/Y',
        ];

        $this->middleware(function ($request, $next) {
            $this->request = $request;

            // because null user in artisan session breaks artisan route:list
            $this->team_id = null;

            if ($this->request->user()) {
                $this->team_id = $this->request->user()->currentTeam->id;

                $this->restore_banners = $this->request->restore_banners;
                $this->fields = [
                    'team_id'            => $this->team_id,
                    'name'               => $this->request->name,
                    'description'        => $this->request->description,
                    'legal_display_copy' => $this->request->legal_display_copy,
                    'external_offer_id'  => $this->request->external_offer_id,
                    'start_date'         => $this->request->start_date,
                    'end_date'           => $this->request->end_date,
                ];

                if ($this->request->department_id) {
                    $this->fields['department_id'] = $this->request->department_id;
                }

                if ($this->request->owner_id) {
                    $this->fields['owner_id'] = $this->request->owner_id;
                }
            }

            return $next($request);
        });
    }

    /**
     * Display a listing of the Offers.
     *
     * @return Response
     */
    public function index($team_id = null)
    {
        $start = $this->request->input('start');
        $end = $this->request->input('end');

        if ($start && $end) {
            // find all offers for current team that occur within date range
            return $this->resource->where('team_id', '=', $this->team_id)->where(
                function ($query) use ($start, $end) {
                    $query->whereBetween('start_date', [$start, $end])
                        ->orWhereBetween('end_date', [$start, $end])
                        ->orWhere([
                            ['start_date', '<=', $start],
                            ['end_date', '>=', $end],
                        ]);
                }
            )->with('department', 'owner')->withTrashed()->get();
        }

        if ($team_id) {
            return $this->resource->where('team_id', $team_id)->with('department', 'owner')->withTrashed()->get();
        }

        return $this->resource->where('team_id', $this->team_id)->with('department', 'owner')->withTrashed()->get();
    }

    /**
     * Display a listing of the archived Offers.
     *
     * @return Response
     **/
    public function archived($team_id = null)
    {
        //may need to retrieve the associated banners here
        if ($team_id) {
            return $this->resource->onlyTrashed()->where('team_id', $team_id)->get();
        }

        return $this->resource->onlyTrashed()->where('team_id', $this->team_id)->get();
    }

    /**
     * Display the specified Offer.
     *
     * @param  int $id
     *
     * @return Response
     **/
    public function show($id)
    {
        return $this->resource->withTrashed()->with('banners')->findOrFail($id);
    }


    /**
     * Restore the specified archived Offer.
     *
     * @param  int $id
     * @return Response
     * */
    public function restore($id)
    {
        try {
            $offer_to_restore = $this->resource->withTrashed()->findOrFail($id);

            //restore the associated banners
            if ($this->restore_banners) {
                $offer_to_restore->banners()->restore();
            }

            $restored = $offer_to_restore->restore() ? 'true' : 'false';

            return response()->json([
                'restored' => $restored,
            ]);

        } catch (Exception $e) {
            return response()->json([
                'restored' => 'false',
                'error'    => $e
            ]);
        }
    }

}
