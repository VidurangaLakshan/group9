<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class LikeButton extends Component
{
    public Post $post;

//    public function mount(Post $post)
//    {
//        $this->post = $post;
//    }

    public function toggleLike()
    {
        if (auth()->guest()) {
            return redirect()->route('login');
        }

        $user = auth()->user();

//        $hasLiked = $user->likes()->where('post_id', $this->post->id)->exists();

        if ($user->hasLiked($this->post)) {
            $user->likes()->detach($this->post->id);
            return;
        }

        $user->likes()->attach($this->post->id);

    }

    public function render()
    {
        return view('livewire.like-button');
    }
}
