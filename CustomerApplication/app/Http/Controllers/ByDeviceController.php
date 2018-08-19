<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ByDeviceController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        $codes = DB::table('users')
            ->distinct()
            ->join('add_codes', 'add_codes.user', '=', 'users.id')
            ->join('GPS', 'add_codes.code', '=', 'GPS.Device')
            ->where('add_codes.user', '=',  Auth::user()->getAuthIdentifier())
            ->select('add_codes.*')
            ->get();

        return view('byDevice', compact('codes'));
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


}
