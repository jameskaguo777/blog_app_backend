<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    public static function boot(){
        parent::boot();

        static::created(function($item){
            // $user
            $ambassodor = Ambassodor::where('user_id', $item->user_id);
            if (!$ambassodor->empty()) {
                $point = $ambassodor->point;
                $ambassodor->update([
                    'point' => (int)$point + 1
                ]);
            }else {
                Ambassodor::create([
                    'user_id' => $item->user_id,
                    'point' => 1
                ]);
            }
        });
    }

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
