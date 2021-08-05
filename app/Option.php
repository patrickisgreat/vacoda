<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable;
use App\Team;
use App\OptionType;
use Illuminate\Support\Arr;

class Option extends Model
{
    use SoftDeletes, Auditable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'options';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'creator_id',
        'team_id',
        'option_type_id',
        'name',
        'abbreviation'
    ];

    public function teams()
    {
        return $this->belongsToMany(Team::class);
    }

    public function optionType()
    {
        return $this->belongsTo(OptionType::class);
    }

    public function transformAudit(array $data)
    {
        Arr::set($data, 'team_id', $this->team_id);

        return $data;
    }
}
