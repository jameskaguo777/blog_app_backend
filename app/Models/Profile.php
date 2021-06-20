<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [ 'profile_image', 'status', 'ambassador_class', 'ambassador_status', 'notification_token', 'user_id' ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
