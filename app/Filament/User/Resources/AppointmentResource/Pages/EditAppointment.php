<?php

namespace App\Filament\User\Resources\AppointmentResource\Pages;

use App\Filament\User\Resources\AppointmentResource;
use App\Models\User;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;

class EditAppointment extends EditRecord
{
    protected static string $resource = AppointmentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    public function afterSave() : void {
        $appointment = $this->record;

        // if event is set to not visible, send a notification to the event's author
        if ($appointment->mode == 1) {
            Notification::make()
                ->title('Updated Appointment')
                ->body("Mode : Physical Meeting")
                ->sendToDatabase(User::where('role', 3)->get());
        } elseif ($appointment->mode == 3) {
            Notification::make()
                ->title('Updated Appointment')
                ->body("Mode : MS Teams Call")
                ->sendToDatabase(User::where('role', 3)->get());
        }
    }
}
