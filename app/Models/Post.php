<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'image',
        'body',
        'published_at',
        'featured',
        'pending',
        'approved',
        'reason_for_rejection',
        'custom_categories'

    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    public function scopeFeatured($query)
    {
        $query->where('featured', true);
    }

    public function scopeLatest($query)
    {
        $query->orderBy('published_at', 'desc');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function likes()
    {
        return $this->belongsToMany(User::class, 'post_like')->withTimestamps();
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function scopeWithCategory($query, string $category)
    {
        $query->whereHas('categories', function($query) use ($category){
            $query->where('slug', $category);
        });
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getReadingTime()
    {
        $mins = round(str_word_count($this->body) / 150);

        return ($mins < 1) ? 1 : $mins;
    }

    public function getThumbnailImage(){
        $isUrl = str_contains($this->image, 'http');

        return ($isUrl) ? $this->image : Storage::disk('public')->url($this->image);
    }

//    protected static function booted()
//    {
//        static::saving(function ($post) {
//            $post->user_id = auth()->id();
//        });
//    }
    protected static function booted()
    {
        static::saving(function ($post) {
            if ($post->isDirty('user_id')) {
                // Check if the user_id is being explicitly set, if so, don't override it.
                return;
            }

            if (!$post->exists) {
                // If the post is being created or updated, set the user_id.
                $post->user_id = auth()->id();
            }
        });
    }
}


