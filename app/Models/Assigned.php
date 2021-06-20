<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assigned extends Model
{
    use HasFactory;

    protected $fillable = [ 'user_id', 'assignable_id', 'assignable_type' ];

    public function assignable(){
        return $this->morphTo();
    }
}
