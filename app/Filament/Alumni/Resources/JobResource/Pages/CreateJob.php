<?php

namespace App\Filament\Alumni\Resources\JobResource\Pages;

use App\Filament\Alumni\Resources\JobResource;
use App\Models\User;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateJob extends CreateRecord
{
    protected static string $resource = JobResource::class;

    public function afterCreate() : void
    {
        $job = $this->record;

        // if event is set to not visible, send a notification to the event's author
        if ($job->approved === false) {
            Notification::make()
                ->title('Job needs approval')
                ->body("'{$job->title}' has been created but is not visible.")
                ->sendToDatabase(User::where('role', 4)->get());
        }
    }
}
