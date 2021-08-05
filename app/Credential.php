<?php

namespace App;

use OwenIt\Auditing\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

class Credential extends Model
{
    use Auditable;

    protected $table = "credentials";

    protected $fillable = [
        'team_id',
        'appsignature',
        'clientid',
        'clientsecret',
        'defaultwsdl',
        'xmlloc'

    ];

    /**
     * Set the clientid
     *
     * @param  string $value
     * @return string
     */
    public function setClientidAttribute($value)
    {
        $this->attributes['clientid'] = Crypt::encrypt($value);
    }

    /**
     * Get the clientid
     *
     * @param  string $value
     * @return string
     */
    public function getClientidAttribute($value)
    {
        return Crypt::decrypt($value);
    }

    /**
     * Set the clientid
     *
     * @param  string $value
     * @return string
     */
    public function setClientsecretAttribute($value)
    {
        $this->attributes['clientsecret'] = Crypt::encrypt($value);
    }

    /**
     * Get the clientid
     *
     * @param  string $value
     * @return string
     */
    public function getClientsecretAttribute($value)
    {
        return Crypt::decrypt($value);
    }
}
