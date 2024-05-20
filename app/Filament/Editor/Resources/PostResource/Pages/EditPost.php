<?php

namespace App\Filament\Editor\Resources\PostResource\Pages;

use App\Filament\Editor\Resources\PostResource;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;

class EditPost extends EditRecord
{
    protected static string $resource = PostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    public function afterSave() : void
    {
        $post = $this->record;

        // if event is set to not visible, send a notification to the event's author
        if ($post->approved === true) {
            Notification::make()
                ->title('Post approval')
                ->body("'{$post->title}' has been approved.")
                ->sendToDatabase($post->author);
        }

        if (($post->reason_for_rejection != null || $post->reason_for_rejection == '') && ($post->approved === false)) {
            Notification::make()
                ->title('Post rejected')
                ->body("'{$post->title}' has been rejected.")
                ->sendToDatabase($post->author);
        }
    }
}
