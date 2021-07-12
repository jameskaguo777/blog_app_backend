<?php

namespace App\Http\Controllers;

use App\Models\HealthEmergency;
use GeoJson\Geometry\Point;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Stmt\Goto_;

class HealthEmergencyController extends Controller
{
    var $message = [];
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
        $validation = Validator::make([
            'note' => 'required',
            'media_url' => 'required',
            'latitude' => 'required',
            'longitude' => 'required'
        ]);
        if ($validation->fails()) {
            $message['errors'] = $validation->errors();
            $message['message'] = 'Something went wrong, try again';
            $message['success'] = false;
            goto end;
        }
        
        $location = new Point($request->latitude, $request->longitude);
        $media_array = [];
        if (is_array($request->media_url)) {
            foreach ($request->media_url as $media) {
                $media_path = $request->file($media)->store('health-emergency');
                array_push($media_array, $media_path);
            }
        } else {
            $media_path = $request->file('media_url')->store('health-emergency');
            array_push($media_array, $media_path);
        }
        $healthEmergency = new HealthEmergency([
            'user_id' => Auth::id(),
            'note' => $request->note,
            'media_url' => $media_array,
            'coordinates' => $location
        ]);
        $saved = $healthEmergency->save();
        if ($saved) {
            $message['success'] = true;
        } else {
            $message['success'] = false;
        }

        end:
        return response()->json([
            'message' => $message
        ]);

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
