<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\FuncCall;

class Ward extends Model
{
    use HasFactory;

    protected $fillable = [ 'name', 'coordinates', 'status', 'activation_code', 'activation_status' ];

    public function competitionWinner(){
        return $this->morphMany(CompetitionWinner::class, 'competition_winnerable');
    }

    public function assigned()
    {
        return $this->morphMany(Assigned::class, 'assignable');
    }

    public function competitionParticipant()
    {
        return $this->morphMany(competitionParticipant::class, 'competition_participantable');
    }
}
