<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function comment(){
        return $this->hasMany(Comment::class, 'user_id', 'id');
    }

    public function event(){
        return $this->hasMany(Event::class, 'user_id', 'id');
    }

    public function point(){
        return $this->hasOne(Point::class, 'user_id', 'id');
    }

    public function post(){
        return $this->hasMany(Post::class, 'user_id', 'id');
    }

    public function profile(){
        return $this->hasOne(Profile::class, 'user_id', 'id');
    }

    public function vote(){
        return $this->hasMany(Vote::class, 'user_id', 'id');
    }

    public function assigned(){
        return $this->hasOne(Assigned::class, 'user_id', 'id');
    }

    public function competitionParticipant(){
        return $this->hasMany(CompetitionParticipant::class, 'user_id', 'id');
    }

}
