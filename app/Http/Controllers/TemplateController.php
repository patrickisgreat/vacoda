<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TemplateController extends Controller
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
     * Show a list of templates.
     *
     * @return Response
     */
    public function index()
    {
        return view('components.templates.list');
    }

    /**
     * Show, create, or edit a template.
     *
     * @param  string $id
     * @return Response
     */
    public function show($id = '')
    {
        return view('components.templates.show', ['resource_id' => $id]);
    }
}
