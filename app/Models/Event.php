<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'description',
        'start_date',
        'end_date',
        'same_day',
        'start_time',
        'end_time',
        'same_time',
        'location',
        'thumbnail',
        'gallery_images',
        'status'
    ];

    protected $casts = [
        'gallery_images' => 'array'
    ];

    public function scopePublished($query)
    {
        $query->where('status', true);
    }

    public function scopeUpcoming($query)
    {
        $query->where('start_date', '>=', now());
    }

    public function scopePast($query)
    {
        $query->where('end_date', '<', now());
    }

    public function scopeOngoing($query)
    {
        $query->where('start_date', '<=', now())
            ->where('end_date', '>=', now());
    }

    public function scopeFeatured($query)
    {
        $query->where('featured', true);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
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

    public function getThumbnailImage()
    {
        $isUrl = str_contains($this->thumbnail, 'http');

        return ($isUrl) ? $this->thumbnail : Storage::disk('public')->url($this->thumbnail);
    }


    protected static function booted()
    {
        static::saving(function ($event) {
            if ($event->isDirty('user_id')) {
                // Check if the user_id is being explicitly set, if so, don't override it.
                return;
            }

            if (!$event->exists) {
                // If the post is being created or updated, set the user_id.
                $event->user_id = auth()->id();
            }
        });
    }
}
