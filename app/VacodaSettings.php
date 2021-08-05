<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VacodaSettings extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'vacoda_settings';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'team_id',
        'active_date_precedence',
    ];

    /**
     * Get the team the settings belong to.
     */
    public function team()
    {
        return $this->belongsTo('App\Team');
    }
}
