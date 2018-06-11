<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataController extends Controller
{
    public function index()
    {
        $history=\App\GpsData::all();
        return view('history',compact('history'));
    }
}
