<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $codes = DB::table('GPS')
            ->join('add_codes', 'add_codes.code', '=', 'GPS.Device')
            ->selectRaw('GPS.*')
            ->where('add_codes.user', '=', Auth::user()->getAuthIdentifier())
            ->whereRaw('GPS.Time IN (SELECT MAX(GPS.Time) FROM `GPS` GROUP BY GPS.Device)')
            ->get();

        return view('home', compact('codes'));
    }

}
