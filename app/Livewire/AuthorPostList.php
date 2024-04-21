<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

class AuthorPostList extends Component
{
    use WithPagination;

    #[Computed()]
    public function posts()
    {
        $user = request()->segment(2);
        return Post::orderBy('published_at', 'desc')
            ->where('user_id', 'like', $user)
            ->where('published_at', '<=', now())
            ->where('approved', 1)
            ->paginate(10);
    }


    public function render()
    {
        return view('livewire.author-post-list');
    }
}
