<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'post_id',
        'comment'
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected static function booted()
    {
        static::saving(function ($comment) {
            if ($comment->isDirty('user_id')) {
                // Check if the user_id is being explicitly set, if so, don't override it.
                return;
            }

            if (!$comment->exists) {
                // If the post is being created or updated, set the user_id.
                $comment->user_id = auth()->id();
            }
        });
    }
}
