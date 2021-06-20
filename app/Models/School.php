<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Grimzy\LaravelMysqlSpatial\Eloquent\SpatialTrait;

class School extends Model
{
    use HasFactory, SpatialTrait;

    protected $fillable = [ 'name', 'phone', 'address', 'coordinates', 'status', 'built_year', 'activation_code', 'activation_code_status' ];

    protected $spatialFields = [
        'coordinates'
    ];

    protected $appends = [
        'status_a',
        'activation_code_status_a'
    ];

    public function getStatusAAttribute(){
        return ($this->status) ? 'Active' : 'Deactiivated' ;
    }

    public function getActivationCodeStatusAAttribute(){
        return ($this->activation_code_status) ? 'Active' : 'Deactivated';
    }

    public function competitionWinner(){
        return $this->morphMany(CompetitionWinner::class, 'competition_winnerable');
    }

    public function assigned(){
        return $this->morphMany(Assigned::class, 'assignable');
    }

    public function competitionParticipant(){
        return $this->morphMany(competitionParticipant::class, 'competition_participantable');
    }
}
