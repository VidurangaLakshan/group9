<?php

namespace App\Http\Controllers;

use App\Models\Event;

class EventController extends Controller
{
    public function index()
    {
        return view('events.index', [
            'ongoingEvents' => Event::where('status', true)
                ->where(function ($query) {
                    $query->where('start_date', '<=', now()->format('Y-m-d'))
                        ->where('end_date', '>=', now()->format('Y-m-d'));
                })
                ->get(),
            'upcomingEvents' => Event::where('status', true)
                ->where('start_date', '>', now()->format('Y-m-d'))
                ->get(),
            'pastEvents' => Event::where('status', true)
                ->where(function ($query) {
                    $query->where('start_date', '<', now()->format('Y-m-d'))
                        ->where('end_date', '<', now()->format('Y-m-d'));
                })
                ->orderBy('start_date', 'desc')
                ->get(),
        ]);
    }

    public function show(Event $event)
    {
        return view('events.show', [
            'event' => $event,
        ]);
    }

    public function club(Event $event)
    {
        return view('events.author', [
            'event' => $event,
        ]);
    }
}
