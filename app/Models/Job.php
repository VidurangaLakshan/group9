<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'qualifications',
        'company',
        'apply_link',
        'faculty',
        'image',
        'approved',
        'reason_for_rejection'
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    protected static function booted()
    {
        static::saving(function ($job) {
            if ($job->isDirty('user_id')) {
                // Check if the user_id is being explicitly set, if so, don't override it.
                return;
            }

            if (!$job->exists) {
                // If the post is being created or updated, set the user_id.
                $job->user_id = auth()->id();
            }
        });
    }

    public function getThumbnailImage(){
        $isUrl = str_contains($this->image, 'http');

        return ($isUrl) ? $this->image : Storage::disk('public')->url($this->image);
    }

    public function resumes()
    {
        return $this->hasMany(Resume::class);
    }
}
