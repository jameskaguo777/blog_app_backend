<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompetitionWinner extends Model
{
    use HasFactory;
    protected $fillable = [ 'total_votes', 'competition_id', 'competition_winnerable_type', 'competition_winnerable_id' ];

    public function competitionWinnerable(){
        return $this->morphTo();
    }

    public function competition(){
        return $this->belongsTo(Competition::class, 'competition_id', 'id');
    }
}
