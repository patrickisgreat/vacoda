<?php

namespace App;

use Laravel\Spark\Team as SparkTeam;
use Laravel\Spark\Spark;
use App\Role;
use App\Offer;
use App\Template;
use App\Theme;
use App\Option;
use OwenIt\Auditing\Auditable;


/**
 * Class Team
 * @package App
 */
class Team extends SparkTeam
{
    use Auditable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'team_contact_name',
        'team_contact_email'
    ];

    /**
     * OVERRIDE FROM PARENT
     *
     * Get all of the users that belong to the team.
     */
    public function users()
    {
        return $this->belongsToMany(
            Spark::userModel(), 'team_users', 'team_id', 'user_id'
        )->withPivot('role')->with('roles');
    }

    /**
     * Returns the Eloquent relationship of roles
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function roles()
    {
        return $this->hasMany(Role::class);
    }

    /**
     * Get the offers that belong to the team.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function offers()
    {
        return $this->hasMany(Offer::class);
    }

    /**
     * Get the templates that belong to the team.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function templates()
    {
        return $this->hasMany(Template::class);
    }

    /**
     * Get the themes that belong to the team.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function themes()
    {
        return $this->hasMany(Theme::class);
    }

    /**
     * Get the options that belong to the team.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function options()
    {
        return $this->hasMany(Option::class);
    }

    /**
     * Get the option types that belong to the team.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function optionTypes()
    {
        return $this->hasMany(OptionType::class);
    }

}
