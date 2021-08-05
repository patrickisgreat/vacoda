<?php

namespace App;

use OwenIt\Auditing\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BannerImage extends Model
{
    use SoftDeletes, Auditable;

    /**
     * The associated table.
     *
     * @var string
     */
    protected $table = 'banner_images';

    /**
     * Fillable fields for a banner image.
     *
     * @var array
     */
    protected $fillable = ['path', 'name'];

    /**
     * A banner image belongs to a banner.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function banner()
    {
        return $this->belongsTo('App\Banner');
    }

    /**
     * Get the base directory for image uploads.
     *
     * @return string
     */
    public function baseDir()
    {
        return env('BANNER_IMAGE_PATH', public_path()) . '/uploads/banner-images';
    }

    public function setNameAttribute($name)
    {
        $this->attributes['name'] = $name;
        $this->path = $this->baseDir() . '/' . $name;
    }
}
