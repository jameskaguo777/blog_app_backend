<?php

namespace App\Http\Controllers;

use App\Http\Resources\CompetitionResource;
use App\Models\Competition;
use App\Models\CompetitionParticipant;
use Grimzy\LaravelMysqlSpatial\Types\Point;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CompetitionParticipantController extends Controller
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
     * @param  \App\Models\CompetitionParticipant  $competitionParticipant
     * @return \Illuminate\Http\Response
     */
    public function show(CompetitionParticipant $competitionParticipant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CompetitionParticipant  $competitionParticipant
     * @return \Illuminate\Http\Response
     */
    public function edit(CompetitionParticipant $competitionParticipant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CompetitionParticipant  $competitionParticipant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CompetitionParticipant $competitionParticipant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CompetitionParticipant  $competitionParticipant
     * @return \Illuminate\Http\Response
     */
    public function destroy(CompetitionParticipant $competitionParticipant)
    {
        //
    }

    public function join(Request $request){
        $validated = Validator::make($request->all(),[
            'competition_id' => 'required',
            'media_files' => 'required',
            'latitude' => 'required',
            'longitude' => 'required'
        ]);

        if ($validated->fails()) {
            $this->message['errors'] = $validated->errors();
        }
        $competition = Competition::find($request->competition_id)->get();
        $user = Auth::user();
        $mediaUrls = [];
        $location = new Point($request->latitude, $request->longitude);
        $competitionParticipant = CompetitionParticipant::create([
            'user_id'=>$user->id,
            'competition_id'=>$competition->id,
            'media_urls' => $mediaUrls,
            'current_location' => $location
        ]);
        return CompetitionResource::collection($competition);
    }
}
