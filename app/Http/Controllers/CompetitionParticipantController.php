<?php

namespace App\Http\Controllers;

use App\Http\Resources\CompetitionParticipantResource;

use App\Models\Competition;
use App\Models\CompetitionParticipant;
use Grimzy\LaravelMysqlSpatial\Types\Point;
use Illuminate\Http\JsonResponse;
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

    public function join(Request $request):JsonResponse{
        $validated = Validator::make($request->all(),[
            'competition_id' => 'required',
            'media_files' => 'required',
            'latitude' => 'required',
            'longitude' => 'required'
        ]);

        if ($validated->fails()) {
            $this->message['success'] = false;
            $this->message['errors'] = $validated->errors();
            $this->message['message'] = 'Some data missing';
            goto end;
        }
        $competition = Competition::find($request->competition_id);
        $user = Auth::user();

        $location = new Point($request->latitude, $request->longitude);
        $competitionParticipant = new CompetitionParticipant([
            'user_id'=>$user->id,
            'competition_id'=>$competition->id,
            'current_location' => $location
        ]);

        $media_array = [];

        if ($request->hasFile('media_files')) {
            if (is_array($request->media_files)) {
                foreach ($request->media_files as $media) {
                    $media_path = $request->file($media)->store('participants');
                    array_push($media_array, $media_path);
                }
            } else{
                $media_path = $request->file('media_files')->store('participants');
                array_push($media_array, $media_path);
            }
        }

        $competitionParticipant->media_urls = $media_array;

        $saved = $competitionParticipant->save();
        if ($saved) {
            $this->message['success'] = true;
        }else{
            $this->message['message'] = 'Something went wrong please try again later';
        }

        end:
        return response()->json([
            'message' => $this->message,
        ]);
    }

    public function participants(){
        $competition = Competition::where('status', true)->first();
        $participants = CompetitionParticipant::with(['comment', 'competition'])->get()->filter(function($model) use($competition){
            return $model->competition_id == $competition->id;
        });
        return CompetitionParticipantResource::collection($participants);
    }
}