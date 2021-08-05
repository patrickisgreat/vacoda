<?php

namespace App\Exceptions;

use Exception;
use Log;

class RoleDoesNotExist extends Exception
{
    //we could do a fancy dance with fancy pants when roles don't exist

    protected $role;

    /**
     * RoleDoesNotExist constructor.
     */
    public function __construct($role)
    {
        $this->role = $role;
        Log::info('This role is having a bad day '.$this->role);
    }

}
