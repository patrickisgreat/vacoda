<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable;
use Illuminate\Support\Arr;

class Theme extends Model
{
    use SoftDeletes, Auditable;

    /**
     *
     * The database table used by the model.
     *
     * @var string
     *
     */
    protected $table = 'themes';

    /**
     *
     * The attributes that are mass assignable.
     *
     * @var array
     *
     */
    protected $fillable = [
        'creator_id',
        'team_id',
        'name',
        'description',
        'font_color',
        'font_color_secondary',
        'cta_font_color',
        'cta_bg_color',
        'background_color',
    ];

    /**
     * Get the team the theme belongs to.
     */
    public function team()
    {
        return $this->belongsTo('App\Team');
    }

    /**
     * Get the user the theme was created by.
     */
    public function creator()
    {
        return $this->belongsTo('App\User');
    }

    public function transformAudit(array $data)
    {
        Arr::set($data, 'team_id', $this->team_id);

        return $data;
    }
}
