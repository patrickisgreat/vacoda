<?php

namespace App\Http\Controllers;

use Maatwebsite\Excel\Files\ExcelFile;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;


class SpreadsheetImportController extends ExcelFile
{
    /**
     * sets delimiter for import
     * @var string
     */
    protected $delimiter = ',';

    /**
     * sets enclosure string for import
     * @var string
     */
    protected $enclosure = '"';

    /**
     * sets line ending for import
     * @var string
     */
    protected $lineEnding = '\r\n';


    /**
     * required from abstract class dumb method just returns the path
     * @return string
     */
    public function getFile()
    {
        return 'storage/tmp/temp.xls';
    }


    /**
     * @return array
     */
    public function getFilters()
    {
        return [
            'chunk'
        ];
    }
}
