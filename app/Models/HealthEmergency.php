<?php

namespace App\Models;

use Grimzy\LaravelMysqlSpatial\Eloquent\SpatialTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HealthEmergency extends Model
{
    use HasFactory, SpatialTrait;

    protected $fillable = [ 'user_id', 'note', 'media_url', 'coordinates' ];

    protected $casts = [
        'media_url' => 'array'
    ];

    protected $spatialFields = [
        'coordinates'
    ];

    public static function boot()
    {
        parent::boot();

        static::created(function ($item) {
            // $user
            $ambassodor = Ambassodor::where('user_id', $item->user_id);
            if (!$ambassodor->empty()) {
                $point = $ambassodor->point;
                $ambassodor->update([
                    'point' => (int)$point + 1
                ]);
            } else {
                Ambassodor::create([
                    'user_id' => $item->user_id,
                    'point' => 1
                ]);
            }
        });
    }

    public function environmentStatus(){
        return $this->hasMany(EnvironmentStatus::class, 'health_emergency_id', 'id');
    }
}
