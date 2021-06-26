<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use HasFactory;

    protected $fillable = [ 'user_id', 'competition_participant_id', 'point' ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function competitionParticipant(){
        return $this->belongsTo(CompetitionParticipant::class, 'competition_participant_id', 'id');
    }
}
