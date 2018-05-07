<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entities\Person;
use App\Entities\Pages;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Person $person, Pages $pages)
    {
        $people = $person->take(5)->get();
        $pages = $pages->take(5)->get();

        return view('pages.dashboard.index', compact('people', 'pages'));
    }
}
