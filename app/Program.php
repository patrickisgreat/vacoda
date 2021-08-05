<?php

namespace App;

use App\Category;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $table = 'programs';

    public function categories()
    {
        return $this->hasMany('App\Category');
    }
}
