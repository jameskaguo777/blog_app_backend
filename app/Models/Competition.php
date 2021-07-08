<?php

namespace App\Models;

use Carbon\Carbon;
use Grimzy\LaravelMysqlSpatial\Eloquent\SpatialTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competition extends Model
{
    use HasFactory, SpatialTrait;

    protected $fillable = ['theme', 'challenge', 'target', 'reward', 'criteria', 'start_date', 'radius', 'end_date', 'geo_locked', 'coordinates', 'start_date', 'end_date', 'status'];

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
        'time_spended'
    ];

    public function getTimeSpendedAttribute(){
        $variables = [];
        $now = Carbon::now();
        $start_date = new Carbon($this->start_date);
        $end_date = new Carbon($this->end_date);
        $total_days = $end_date->diff($start_date)->days;
        $days_expended = $now->diff($start_date)->days;
        $time_spended_in_percentage = ($days_expended / $total_days) * 100;
        $variables['time_spended_in_percentage'] = $time_spended_in_percentage;
        $variables['days_expended'] = $days_expended;
        $variables['total_days'] = $total_days;
        $variables['days_remaining'] = $total_days - $days_expended;
        return $variables;
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

    public function competitionParticipant(){
        return $this->hasOne(CompetitionParticipant::class, 'competition_id', 'id');
    }
}
