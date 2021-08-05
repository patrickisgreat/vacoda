<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OptionController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

        // $this->middleware('subscribed');
    }

    /**
     * Show a list of options.
     *
     * @return Response
     */
    public function index()
    {
        return view('components.options.list');
    }

    /**
     * Show, create, or edit an option.
     *
     * @param  string $id
     * @return Response
     */
    public function show($id = '')
    {
        return view('components.options.show', ['resource_id' => $id]);
    }
}
