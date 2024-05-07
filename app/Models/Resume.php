<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'job_id',
        'resume'
    ];

    public function job()
    {
        return $this->belongsTo(Job::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    protected static function booted()
    {
        static::saving(function ($resume) {
            if ($resume->isDirty('user_id')) {
                // Check if the user_id is being explicitly set, if so, don't override it.
                return;
            }

            if (!$resume->exists) {
                // If the post is being created or updated, set the user_id.
                $resume->user_id = auth()->id();
            }
        });
    }
}
