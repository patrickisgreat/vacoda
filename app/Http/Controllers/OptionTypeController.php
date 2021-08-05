<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OptionTypeController extends Controller
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
     * Show a list of option types.
     *
     * @return Response
     */
    public function index()
    {
        return view('components.option-types.list');
    }

    /**
     * Show, create, or edit an option type.
     *
     * @param  string $id
     * @return Response
     */
    public function show($id = '')
    {
        return view('components.option-types.show', ['resource_id' => $id]);
    }

    /**
     * List options that belong to an option type.
     *
     * @return Response
     */
    public function options()
    {
        return view('components.option-types.option-list');
    }
}
