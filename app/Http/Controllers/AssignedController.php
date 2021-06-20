<?php

namespace App\Http\Controllers;

use App\Models\Assigned;
use App\Models\School;
use Illuminate\Http\Request;

class AssignedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id, $model, $userID)
    {
        //
        if ($model === 'school') {
            $school = School::find($id);
            $assigned = new Assigned([ 'user_id'=>$userID ]);
            $school->assigned()->attach($assigned);
        } else {
            # code...
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //x
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Assigned  $assigned
     * @return \Illuminate\Http\Response
     */
    public function show(Assigned $assigned)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Assigned  $assigned
     * @return \Illuminate\Http\Response
     */
    public function edit(Assigned $assigned)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Assigned  $assigned
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Assigned $assigned)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Assigned  $assigned
     * @return \Illuminate\Http\Response
     */
    public function destroy(Assigned $assigned)
    {
        //
    }
}
