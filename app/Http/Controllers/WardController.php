<?php

namespace App\Http\Controllers;

use App\Models\Ward;
use Grimzy\LaravelMysqlSpatial\Types\Point;
use Illuminate\Http\Request;

class WardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    var $message = [];
    public function index()
    {
        //
        $wards = Ward::all();
        return view('ward.index', compact('wards'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('ward.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'name'=>'required',
            'activation_code'=>'required',
            'latitude'=>'required',
            'longitude'=>'required'
        ]);
        $coordinates = new Point($request->latitude, $request->longitude);
        // dd($coordinates);
        $wards = new Ward($request->except(['coordinates', 'status', 'activation_status']));
        $wards->coordinates = $coordinates;
        $wards->status = true;
        $wards->activation_status = true;
        $saved = $wards->save();
        $this->message['message'] = ($saved) ? 'Successful ward added' : 'Something went wrong';
        return ($saved) ? redirect()->back()->with('success', $this->message['message']) : $this->message['message'];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ward  $ward
     * @return \Illuminate\Http\Response
     */
    public function show(Ward $ward)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ward  $ward
     * @return \Illuminate\Http\Response
     */
    public function edit(Ward $ward)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ward  $ward
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ward $ward)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ward  $ward
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ward $ward)
    {
        //
    }
}
