<?php

namespace App\Http\Controllers;

use App\AddCode;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $codes=AddCode::all();
        return view('viewCodes', compact('codes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('addCode');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $codes = new AddCode();
        $codes->code=$request->get('code');
        $codes->user= Auth::user()->getAuthIdentifier();
        $codes->created_at = Carbon::now();
        $codes->updated_at = Carbon::now();
        $codes->save();

         return redirect('codes')->with('succes', 'information has been added');
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $code = AddCode::find($id);
        return view('edit', compact('code', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $code = AddCode::find($id);
        $code->code=$request->get('code');
        $code->user= Auth::user()->getAuthIdentifier();
        $code->created_at = Carbon::now();
        $code->updated_at = Carbon::now();
        $code->save();

        return redirect('codes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $code = AddCode::find($id);
        $code->delete();
        return redirect('codes')->with('success','Information has been deleted');
    }
}
