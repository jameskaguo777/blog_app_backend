<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Grimzy\LaravelMysqlSpatial\Eloquent\SpatialTrait;

class CompetitionParticipant extends Model
{
    use HasFactory, SpatialTrait;

    protected $fillable = [ 'user_id', 'media_urls', 'competition_id', 'current_location' ];

    protected $casts = [
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
        return $this->hasMany(Vote::class, 'competition_participant_id', 'id');
    }

    public function comment(){
        return $this->morphMany(Comment::class, 'commentable');
    }
}
