<?php

namespace App\Http\Controllers;

use App\Models\Point;
use App\Models\School;
use Grimzy\LaravelMysqlSpatial\Types\Point as TypesPoint;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $schools = School::get();
        return view('school.index', compact([ 'schools' ]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('school.create');
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
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'built_year' => 'required',
            'activation_code' => 'required'
        ]);

        $coordinates = new TypesPoint($request->latitude, $request->longitude);

        $school = new School([
            'name'=>$request->name,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'coordinates'=>$coordinates,
            'built_year'=>$request->built_year,
            'activation_code'=>$request->activation_code,
            'activation_code_status'=>true,
            'status'=>true
        ]);

        $save = $school->save();

        return ($save) ? redirect()->back()->with('success', 'successfuly school added') : redirect()->back()->with('error', 'failed to add school');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\School  $school
     * @return \Illuminate\Http\Response
     */
    public function show(School $school)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\School  $school
     * @return \Illuminate\Http\Response
     */
    public function edit(School $school)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\School  $school
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, School $school)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\School  $school
     * @return \Illuminate\Http\Response
     */
    public function destroy(School $school)
    {
        //
    }
}
