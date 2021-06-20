<?php

namespace App\Models;

use Carbon\Carbon;
use Grimzy\LaravelMysqlSpatial\Eloquent\SpatialTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competition extends Model
{
    use HasFactory, SpatialTrait;

    protected $fillable = ['theme', 'challenge', 'reward', 'criteria', 'start_date', 'radius', 'end_date', 'geo_locked', 'coordinates', 'start_date', 'end_date'];

    protected $cast = [
        'geo_locked' => 'boolean',
        'start_date' => 'date:d-m-Y',
        'end_date' => 'date:d-m-Y'
    ];

    protected
        $spatialFields = [
            'coordinates'
        ];

    protected $appends = [
        'geo_locked_a',
        'remaining_days_percentage'
    ];

    public function getRemainingDaysPercentageAttribute(){
        $now = Carbon::now();
        $start_date = new Carbon($this->start_date);
        $end_date = new Carbon($this->end_date);
        $total_days = $end_date->diff($start_date)->days;
        $days_expended = $now->diff($start_date)->days;

        return ($days_expended/$total_days)*100;
    }

    public function getGeoLockedAAttribute(){
        return ($this->geo_locked) ? 'True' : 'False' ;
    }

    public function comment()
    {
        return $this->hasMany(Comment::class, 'competition_id', 'id');
    }

    public function competitionWinner()
    {
        return $this->hasOne(CompetitionWinner::class, 'competition_id', 'id');
    }
}
