<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class ReportController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the report form.
     *
     * @return Response
     */
    public function show()
    {
        return view('components.reports.show');
    }
}


