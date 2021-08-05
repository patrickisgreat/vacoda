<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Impression extends Model
{
    //
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'impressions';

    protected $fillable = [
        'SentCount',
        'OpenCount',
        'SentCount',
        'ClickCount',
        'Campaign',
        'SentDate',
        'BounceCount',
    ];

    public function getSentDateAttribute($value)
    {
        if (!$value || is_null($value)) {
            return null;
        }

        return Carbon::parse($value)->format('m/d/Y H:i:s');
        //return Carbon::parse($value)->format('m/d/Y');
    }

    public function setSentDateAttribute($value)
    {
        if (!$value || is_null($value)) {
            $this->attributes['SentDate'] = null;
        }
        $this->attributes['SentDate'] = Carbon::parse($value)->format('Y-m-d H:i:s');
        //$this->attributes['start_date'] = Carbon::parse($value)->format('Y-m-d');
    }
}
