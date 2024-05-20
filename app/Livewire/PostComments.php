<?php

namespace App\Livewire;

use App\Models\Post;
use Filament\Notifications\Notification;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Rule;
use Livewire\Component;

class PostComments extends Component
{
    public Post $post;

    #[Rule('required|min:3|max:255')]
    public string $comment;

    public function postComment()
    {
        $this->validateOnly('comment');
        $this->post->comments()->create([
            'comment' => $this->comment,
            'user_id' => auth()->id(),
        ]);

        Notification::make()
            ->title('New Comment')
            ->body("{$this->comment}")
            ->sendToDatabase($this->post->author);

        $this->reset('comment');
    }

    #[Computed()]
    public function comments()
    {
        return $this?->post?->comments()->latest()->get();
    }

    public function render()
    {
        return view('livewire.post-comments');
    }
}
