<?php

namespace App\Filament\Alumni\Resources\JobResource\Pages;

use App\Filament\Alumni\Resources\JobResource;
use App\Models\User;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;

class EditJob extends EditRecord
{
    protected static string $resource = JobResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    public function afterSave() : void
    {
        $job = $this->record;

        Notification::make()
            ->title('Job needs approval')
            ->body("'{$job->title}' has been created but is not visible.")
            ->sendToDatabase(User::where('role', 4)->get());

    }
}
