<?php

namespace App\Http\Controllers;

use App\Models\Competition;
use Grimzy\LaravelMysqlSpatial\Types\Point;
use Illuminate\Http\Request;
use Monolog\Handler\RedisHandler;

class CompetitionController extends Controller
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
        $competitions = Competition::get();
        return view('competition.index', compact('competitions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('competition.create');
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
            'theme' => 'required|max:250',
            'challenge' => 'required',
            'reward' => 'required',
            'criteria' => 'required',
            'target' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'radius' => 'nullable|numeric',
            'image_url' => 'nullable',
            'geo_locked' => 'nullable|boolean',
        ]);
        $imagePath = null;
        if (!empty($request->file('image_url'))) {
            $imagePath = $request->file('image_url')->store('competition');
        }
        if ($request->target === 'wards') {
            $competition = new Competition([
                'theme' => $request->theme,
                'challenge' => $request->challenge,
                'reward' => $request->reward,
                'criteria' => $request->criteria,
                'target' => $request->target,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'image_url' => $imagePath,
            ]);
            if ($request->geo_locked) {
                $coodinates = new Point($request->latitude, $request->longitude);
                $competition->geo_locked = $request->geo_locked;
                $competition->coordinates = $coodinates;
                $competition->radius = $request->radius;
            }

            $saved = $competition->save();
            
            $retVal = ($saved) ? 'Successful created' : 'Something went wrong';
            $message['message'] = $retVal;
            $message['status'] = $saved;
        } else{
            $competition = new Competition($request->except('image_url', 'radius'));
            $competition->image_url = $imagePath;
            // dd($competition);
            $saved = $competition->save();
            $retVal = ($saved) ? 'Successful created' : 'Something went wrong';
            $message['message'] = $retVal;
            $message['status'] = $saved;
        }

       return ($message['status']) ? redirect()->back()->with('success', $message['message']) : redirect()->back()->with('error', $message['message']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Competition  $competition
     * @return \Illuminate\Http\Response
     */
    public function show(Competition $competition)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Competition  $competition
     * @return \Illuminate\Http\Response
     */
    public function edit(Competition $competition)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Competition  $competition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Competition $competition)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Competition  $competition
     * @return \Illuminate\Http\Response
     */
    public function destroy(Competition $competition)
    {
        //
    }
}
