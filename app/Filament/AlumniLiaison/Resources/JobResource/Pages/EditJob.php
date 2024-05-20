<?php

namespace App\Filament\AlumniLiaison\Resources\JobResource\Pages;

use App\Filament\AlumniLiaison\Resources\JobResource;
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

        // if event is set to not visible, send a notification to the event's author
        if ($job->approved === true) {
            Notification::make()
                ->title('Job approval')
                ->body("'{$job->title}' has been approved.")
                ->sendToDatabase($job->author);
        }
    }
}
