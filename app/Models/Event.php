<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [ 'title', 'status', 'content', 'date', 'user_id' ];

    protected $appends = [
        'status_a'
    ];
    public function getStatusAAttribute(){
        return ($this->status) ? 'Active' : 'Deactivated';
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function commentable(){
        return $this->morphMany(Comment::class, 'commentable');
    }
}
