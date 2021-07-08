<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [ 'title', 'status', 'image_url', 'content', 'user_id' ];

    protected $appends = [
        'status_a',
    ];

    public function getStatusAAttribute()
    {
        return ($this->status) ? 'Published' : 'Unpublished' ;
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function comment(){
        return $this->morphMany(Comment::class, 'commentable');
    }
}
