<?php

namespace App\Livewire;

use App\Models\Event;
use App\Models\Post;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

class ClubEventList extends Component
{
    use WithPagination;

    #[Computed()]
    public function events()
    {
        $user = request()->segment(2);
        return Event::orderBy('start_date', 'desc')
            ->where('user_id', 'like', $user)
            ->where('status', 1)
            ->paginate(10);
    }

    public function render()
    {
        return view('livewire.club-event-list');
    }
}
