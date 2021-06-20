<?php

namespace App\Http\Controllers;

use App\Models\HealthEmergency;
use Illuminate\Http\Request;

class HealthEmergencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('health-emergency.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HealthEmergency  $healthEmergency
     * @return \Illuminate\Http\Response
     */
    public function show(HealthEmergency $healthEmergency)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HealthEmergency  $healthEmergency
     * @return \Illuminate\Http\Response
     */
    public function edit(HealthEmergency $healthEmergency)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HealthEmergency  $healthEmergency
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HealthEmergency $healthEmergency)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HealthEmergency  $healthEmergency
     * @return \Illuminate\Http\Response
     */
    public function destroy(HealthEmergency $healthEmergency)
    {
        //
    }
}
