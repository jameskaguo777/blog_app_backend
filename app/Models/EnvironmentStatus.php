<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnvironmentStatus extends Model
{
    use HasFactory;

    protected $fillable = [ 'note', 'media_url', 'health_emergency_id', 'coordinates' ];

    public function healthEmergency(){
        return $this->belongsTo(HealthEmergency::class, 'health_emergency_id', 'id');
    }
}