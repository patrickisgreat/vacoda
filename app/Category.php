<?php

namespace App;

use App\Http\Controllers\SpreadsheetImportController as SpreadsheetImportController;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Application;
use App\Http\Requests;
use App\Program;
use Log;

class Category extends Model
{
    protected $table = 'categories';

    public function program()
    {
        return $this->belongsTo('App\Program');
    }

    public function banners()
    {
        return $this->belongsToMany('App\Banner');
    }
}