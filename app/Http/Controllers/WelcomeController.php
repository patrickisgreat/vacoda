<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    /**
     * Show the application splash screen.
     *
     * @return Response
     */
    public function show()
    {
        return view('welcome');
    }

    /**
     * Redirect to welcome page.
     *
     * @return Response
     */
    public function redirect()
    {
        return redirect('/');
    }
}
