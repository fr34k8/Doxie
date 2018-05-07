<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    /**
     * ApiController constructor
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display the user's api information
     *
     * @return void
     */
    public function index()
    {
        return view('pages.api.index');
    }
}
