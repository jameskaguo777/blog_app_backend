<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ambassodor extends Model
{
    use HasFactory;

    protected $fillables = [ 'user_id', 'points' ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }


}
