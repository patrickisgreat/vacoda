<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable;
use App\Team;
use App\Option;
use Illuminate\Support\Arr;

class OptionType extends Model
{
    use SoftDeletes, Auditable;

    protected $table = 'option_types';

    protected $fillable = [
        'creator_id',
        'team_id',
        'name',
    ];

    public function options()
    {
        return $this->hasMany(Option::class);
    }

    public function transformAudit(array $data)
    {
        Arr::set($data, 'team_id', $this->team_id);

        return $data;
    }
}
