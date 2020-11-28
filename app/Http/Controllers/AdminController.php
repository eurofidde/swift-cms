<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Admin Controller
    |--------------------------------------------------------------------------
    |
    | This is a generic controller for any pages that don't require a seperate
    | controller.
    |
    */


    public function __construct()
    {
        $this->middleware('auth');
    }


    public function dashboard()
    {
        return view('dashboard');
    }
}
