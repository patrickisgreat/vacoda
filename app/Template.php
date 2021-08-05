<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable;
use Illuminate\Support\Arr;

class Template extends Model
{
    use SoftDeletes, Auditable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'templates';

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
        'html',
        'css',
        'is_image',
        'width_desktop',
        'width_mobile',
        'has_cta',
        'has_themes',
        'image_export_required',
        'has_alt_ctas',
    ];

    /**
     * Get the team the template belongs to.
     */
    public function team()
    {
        return $this->belongsTo('App\Team');
    }

    /**
     * Get the user the template was created by.
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
