<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'mode',
        'category',
        'location',
        'date',
        'time_slot',
        'slot_token',
        'contact',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected static function booted()
    {
        static::saving(function ($appointment) {
            $appointment->slot_token = str($appointment->date) . '-000000-' . str($appointment->time_slot);
            if ($appointment->isDirty('user_id')) {
                // Check if the user_id is being explicitly set, if so, don't override it.
                return;
            }

            if (!$appointment->exists) {
                // If the post is being created or updated, set the user_id.
                $appointment->user_id = auth()->id();
            }
        });
    }
}
