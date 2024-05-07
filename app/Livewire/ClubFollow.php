<?php

namespace App\Livewire;

use App\Models\User;
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

//        $hasLiked = $user->likes()->where('post_id', $this->post->id)->exists();

        if ($userAuth->hasFollowed($this->user)) {
            $userAuth->followings()->detach($this->user->id);
            return;
        }

        $userAuth->followings()->attach($this->user->id);

    }

    public function render()
    {
        return view('livewire.club-follow');
    }
}
