<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompetitionParticipant extends Model
{
    use HasFactory;

    protected $fillable = [ 'user_id', 'media_urls', 'competition_id', 'current_location' ];

    protected $cast = [
        'media_urls'=>'array'
    ];

    protected $spatialFields = [
        'current_location'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function competition(){
        return $this->belongsTo(Competition::class, 'competition_id', 'id');
    }

    public function vote(){
        return $this->hasOne(Vote::class, 'competition_participant_id', 'id');
    }

    public function commentable(){
        return $this->morphMany(Comment::class, 'commentable');
    }
}
