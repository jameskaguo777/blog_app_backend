<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [ 'user_id', 'commentable_id', 'commentable_type', 'comment' ];

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

    protected $appends = [
        'commenter'
    ];

    public function getCommenterAttribute()
    {
        return User::find($this->user_id)->name;
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

   public function commentable(){
       return $this->morphTo();
   }
}
