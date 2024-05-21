<?php

namespace App\Filament\Academics\Resources\PostResource\Pages;

use App\Filament\Academics\Resources\PostResource;
use App\Models\User;
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

    public function afterSave(): void
    {
        $post = $this->record;

        Notification::make()
            ->title('Post needs approval')
            ->body("'{$post->title}' has been created but is not visible.")
            ->sendToDatabase(User::where('role', 2)->get());

    }
}
