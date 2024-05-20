<?php

namespace App\Livewire;

use App\Models\User;
use Filament\Notifications\Notification;
use Livewire\Component;

class ClubFollow extends Component
{
    public User $user;

    public function toggleFollow()
    {
        if (auth()->guest()) {
            return redirect()->route('login');
        }

        $userAuth = auth()->user();

        if ($userAuth->hasFollowed($this->user)) {
            $userAuth->followings()->detach($this->user->id);
            return;
        }

        $userAuth->followings()->attach($this->user->id);

        Notification::make()
            ->title('New Follower')
            ->body("{$userAuth->name} has followed you.")
            ->sendToDatabase($this->user);
    }

    public function render()
    {
        return view('livewire.club-follow');
    }
}
