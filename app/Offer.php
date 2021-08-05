<?php

namespace App;

use App\Status;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use OwenIt\Auditing\Auditable;
use Illuminate\Support\Facades\Bus;
use App\Jobs\UpdateBannerInExactTarget;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Log;
use Auth;


class Offer extends Model
{
    use SoftDeletes, Auditable, DispatchesJobs;
    use \Askedio\SoftCascade\Traits\SoftCascadeTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'offers';

    /**
     * Cascade soft deletes to these models
     *
     * @var array
     */
    protected $softCascade = ['banners'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'creator_id',
        'team_id',
        'name',
        'description',
        'owner_id',
        'legal_display_copy',
        'external_offer_id',
        'offer_owner',
        'department_id',
        'start_date',
        'end_date'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    //protected $hidden = [];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at', 'deleted_at', 'start_date', 'end_date'];

    /**
     * Get the team the offer belongs to.
     */
    public function team()
    {
        return $this->belongsTo('App\Team');
    }

    /**
     * Get the user the offer belongs to.
     */
    public function owner()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the user the offer was created by.
     */
    public function creator()
    {
        return $this->belongsTo('App\User');
    }

    public function banners()
    {
        return $this->hasMany('App\Banner');
    }

    public function department()
    {
        return $this->belongsTo('App\Option');
    }

    public function getStartDateAttribute($value)
    {
        if (!$value || is_null($value)) {
            return null;
        }

        return Carbon::parse($value)->format('m/d/Y');
    }

    public function setStartDateAttribute($value)
    {
        if (!$value || is_null($value)) {
            $this->attributes['start_date'] = null;
        }

        $this->attributes['start_date'] = Carbon::parse($value)->format('Y-m-d');
    }

    public function getEndDateAttribute($value)
    {
        if (!$value || is_null($value)) {
            return null;
        }

        return Carbon::parse($value)->format('m/d/Y');
    }

    public function setEndDateAttribute($value)
    {
        if (!$value || is_null($value)) {
            $this->attributes['end_date'] = null;
        }

        $this->attributes['end_date'] = Carbon::parse($value)->format('Y-m-d');
    }

    public function transformAudit(array $data)
    {
        Arr::set($data, 'team_id', $this->team_id);

        if ($data['type'] === 'deleted') {
            Arr::set($data, 'type', 'archived');
        }

        return $data;
    }


    /**
     *
     * listens for a delete and sets the
     * status of related banners
     *
     */
    protected static function boot() {
        parent::boot();

        $archived = Status::archived;

        static::deleting(function($offer) {
            $archived = Status::archived;

            $offer->banners()->each(function ($banner) use ($archived) {
                $banner->status = $archived;
                $banner->save();
            });

            $offer->syncBanners($offer->banners);

        });

        static::restoring(function($offer) {

            $restored = Status::pending;

            $offer->banners()->each(function ($banner) use ($restored) {
                $banner->status = $restored;
                $banner->save();
            });

            $offer->syncBanners($offer->banners);

        });

    }

    public static function syncBanners($banners) {
        $model = new self;
        $team_id = Auth::user()->currentTeam->id;
        Log::info('SYNC BANNERS');
        Log::info($model);
        Log::info($team_id);

        $formatted_banners_array = self::format_banner_data_for_sfmc_api($banners);

        $model->dispatch(new UpdateBannerInExactTarget($formatted_banners_array, $team_id, false, true));
    }

    public static function format_banner_data_for_sfmc_api($banners)
    {
        $data = [];
        foreach($banners as $key => $value) {
            $data[$key]['keys'] = [
              "id" => $value['attributes']['id']
            ];
            $data[$key]['values'] = $value['attributes'];

        }
        return $data;
    }

}
