<?php

namespace App\Filament\Sss\Resources\PostResource\Pages;

use App\Filament\Sss\Resources\PostResource;
use App\Models\User;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreatePost extends CreateRecord
{
    protected static string $resource = PostResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    public function afterCreate() : void
    {
        $post = $this->record;

        // if event is set to not visible, send a notification to the event's author
        if ($post->approved === false) {
            Notification::make()
                ->title('Post needs approval')
                ->body("'{$post->title}' has been created but is not visible.")
                ->sendToDatabase(User::where('role', 2)->get());
        }
    }
}
