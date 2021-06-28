<?php

namespace App\Http\Controllers;

use App\Http\Resources\CompetitionParticipantResource;
use App\Http\Resources\VoteResource;
use App\Models\CompetitionParticipant;
use App\Models\Vote;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VoteController extends Controller
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
        $vote = new Vote([
            'user_id' => Auth::id(),
            'competition_participant_id' => $request->competition_participant_id,
            'point' => $request->point
        ]);

        $saved = $vote->save();

        if ($saved) {
            $this->message['success'] = true;
        }

        return response()->json([
            'message' => $this->message
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vote  $vote
     * @return \Illuminate\Http\Response
     */
    public function show(Vote $vote)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vote  $vote
     * @return \Illuminate\Http\Response
     */
    public function edit(Vote $vote)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vote  $vote
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vote $vote)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vote  $vote
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vote $vote)
    {
        //
    }

    public function votable(){
        $votable = CompetitionParticipant::get()->with('comment')->filter(function($model){
            return $model->vote->user_id != Auth::id();
        });
        return VoteResource::collection($votable);
    }

    // public function participants(){
    //     $competitions_participants = CompetitionParticipant::get()->filter(function($model){
    //         return $model->vote->user_id != Auth::id();
    //     });

    //     return CompetitionParticipantResource::collection($competitions_participants);
    // }
}
