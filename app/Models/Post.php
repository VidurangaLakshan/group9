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

    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    public function scopeFeatured($query)
    {
        $query->where('featured', true);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
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
        $mins = round(str_word_count($this->body) / 250);

        return ($mins < 1) ? 1 : $mins;
    }

    public function getThumbnailImage(){
        $isUrl = str_contains($this->image, 'http');

        return ($isUrl) ? $this->image : Storage::disk('public')->url($this->image);
    }

}


