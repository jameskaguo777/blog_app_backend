<?php

namespace App\Http\Controllers;

use App\Models\EnvironmentStatus;
use Illuminate\Http\Request;

class EnvironmentStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('environment-status.index');
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
     * @param  \App\Models\EnvironmentStatus  $environmentStatus
     * @return \Illuminate\Http\Response
     */
    public function show(EnvironmentStatus $environmentStatus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EnvironmentStatus  $environmentStatus
     * @return \Illuminate\Http\Response
     */
    public function edit(EnvironmentStatus $environmentStatus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EnvironmentStatus  $environmentStatus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EnvironmentStatus $environmentStatus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EnvironmentStatus  $environmentStatus
     * @return \Illuminate\Http\Response
     */
    public function destroy(EnvironmentStatus $environmentStatus)
    {
        //
    }
}
