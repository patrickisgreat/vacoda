<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ThemeController extends Controller
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
     * Show a list of themes.
     *
     * @return Response
     */
    public function index()
    {
        return view('components.themes.list');
    }

    /**
     * Show, create, or edit a theme.
     *
     * @param  string $id
     * @return Response
     */
    public function show($id = '')
    {
        return view('components.themes.show', ['resource_id' => $id]);
    }
}
