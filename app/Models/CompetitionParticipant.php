<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompetitionParticipant extends Model
{
    use HasFactory;

    protected $fillable = [ 'competition_participantable_id', 'competition_participantable_type' ];

    public function competitionParticipantable(){
        return $this->morphTo();
    }
}
