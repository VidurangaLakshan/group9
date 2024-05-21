<?php

namespace App\Filament\Club\Resources\PostResource\Pages;

use App\Filament\Club\Resources\PostResource;
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
        ];
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
