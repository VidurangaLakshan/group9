<?php

namespace App\Filament\User\Resources\AppointmentResource\Pages;

use App\Filament\User\Resources\AppointmentResource;
use App\Models\User;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateAppointment extends CreateRecord
{
    protected static string $resource = AppointmentResource::class;

    public function afterCreate(): void
    {
        $appointment = $this->record;

        if ($appointment->mode == 1) {
            Notification::make()
                ->title('New Appointment')
                ->body("Mode : Physical Meeting")
                ->sendToDatabase(User::where('role', 3)->get());
        } elseif ($appointment->mode == 3) {
            Notification::make()
                ->title('New Appointment')
                ->body("Mode : MS Teams Call")
                ->sendToDatabase(User::where('role', 3)->get());
        }

    }
}
