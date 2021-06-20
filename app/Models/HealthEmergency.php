<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HealthEmergency extends Model
{
    use HasFactory;

    protected $fillable = [ 'note', 'media_url', 'coordinates' ];

    public function environmentStatus(){
        return $this->hasMany(EnvironmentStatus::class, 'health_emergency_id', 'id');
    }
}
