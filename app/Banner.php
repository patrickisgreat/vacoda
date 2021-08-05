<?php

namespace App;

use Log;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use OwenIt\Auditing\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Banner extends Model
{
    use SoftDeletes, Auditable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'banners';

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at', 'deleted_at', 'start_date', 'end_date'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'creator_id', // TODO: Security: should this be fillable?
        'offer_id', // TODO: Security: should this be fillable?
        'template_id',
        'theme_id',
        'team_id',
        // details
        'name',
        'description',
        'start_date',
        'end_date',
        'display_end_date',
        // category
        'categories',
        'campaign',
        // contents
        'headline',
        'headline_font_size',
        // 'sub_headline',
        'body',
        'body_font_size',
        'cta',
        'url',
        // 'disclaimer',
        'legal_copy',
        'image_file_name',
        'image_alt',
        // misc
        'status', // TODO: Security: should this be fillable?
        'denial_comments',
        'compiled_html',
        'export_image',
    ];

    protected $appends = ['categories', 'campaign'];

    public function offer()
    {
        return $this->belongsTo('App\Offer');
    }

    public function getCategoriesAttribute()
    {
        return $this->categories()->getRelatedIds();
    }

    public function setCategoriesAttribute($category_ids)
    {
        return $this->categories()->sync($category_ids);
    }

    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }

    public function getCampaignAttribute()
    {
        $categories = $this->categories()->get();
        $campaign = '';

        if (!empty($categories)) {
            foreach ($categories as $category) {
                $campaign .= $category->cell_label . '^';
            }
        }

        return $campaign;
    }

    public function setCampaignAttribute()
    {
        $categories = $this->categories()->get();
        $campaign = '';

        if (!empty($categories)) {
            foreach ($categories as $category) {
                $campaign .= $category->cell_label . '^';
            }
        }

        $this->attributes['campaign'] = $campaign;
    }

    public function template()
    {
        return $this->belongsTo('App\Template');
    }

    public function theme()
    {
        return $this->belongsTo('App\Theme');
    }

    public function creator()
    {
        return $this->belongsTo('App\User');
    }

    public function banner_image()
    {
        return $this->hasOne('App\BannerImage');
    }

    public function getStartDateAttribute($value)
    {
        if (!$value || is_null($value)) {
            return null;
        }

        return Carbon::parse($value)->format('m/d/Y H:i:s');
        //return Carbon::parse($value)->format('m/d/Y');
    }

    public function getEndDateAttribute($value)
    {
        if (!$value || is_null($value)) {
            return null;
        }

        return Carbon::parse($value)->format('m/d/Y H:i:s');
        //return Carbon::parse($value)->format('m/d/Y');
    }

    public function setStartDateAttribute($value)
    {
        if (!$value || is_null($value)) {
            $this->attributes['start_date'] = null;
        }
        $this->attributes['start_date'] = Carbon::parse($value)->format('Y-m-d H:i:s');
        //$this->attributes['start_date'] = Carbon::parse($value)->format('Y-m-d');
    }

    public function setEndDateAttribute($value)
    {
        if (!$value || is_null($value)) {
            $this->attributes['end_date'] = null;
        }
        $this->attributes['end_date'] = Carbon::parse($value)->format('Y-m-d H:i:s');
        //$this->attributes['end_date'] = Carbon::parse($value)->format('Y-m-d');
    }

    public function transformAudit(array $data)
    {
        Arr::set($data, 'team_id', $this->team_id);

        if ($data['type'] === 'deleted' && isset($data['new']['auto_archived']) &&  $data['new']['auto_archived'] === 0 || $data['type'] === 'deleted' && !isset($data['new']['auto_archived'])) {
            Arr::set($data, 'type', 'archived');
        }

        if ($data['type'] === 'deleted' && $data['new'] && $data['new']['auto_archived'] === 1) {
            Arr::set($data, 'type', 'Auto Archived');
            Arr::set($data, 'user_id', 1);
        }

        if ($data['type'] === 'updated') {
            Arr::set($data, 'type', 'edited');
        }

        if (isset($data['old']['status']) && isset($data['new']['status'])) {
            if ($data['old']['status'] !== $data['new']['status']) {
                switch ($data['new']['status']) {
                    case 'Approved':
                        $status = 'approved';
                        break;
                    case 'Denied':
                        $status = 'denied';
                        break;
                    case 'Archived':
                        if (isset($data['new']['auto_archived']) && $data['new']['auto_archived'] === 1) {
                            $status = 'Auto Archived';
                            Arr::set($data, 'user_id', 1);
                        } else {
                            $status = 'archived';
                        }
                        break;
                    default:
                        $status = 'edited';
                        break;
                }

                Arr::set($data, 'type', $status);
            }
        }

        return $data;
    }
}
