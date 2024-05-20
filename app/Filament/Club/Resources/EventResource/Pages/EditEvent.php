<?php

namespace App\Filament\Club\Resources\EventResource\Pages;

use App\Filament\Club\Resources\EventResource;
use App\Models\User;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\DB;

class EditEvent extends EditRecord
{
    protected static string $resource = EventResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    public function afterSave(): void
    {
        $event = $this->record;
        $user = auth()->user();

        if ($event->status == 1) {

            // send this to all the followers for this user in the club_follow table

            $followers = DB::table('club_follow')->where('user_id', $user->id)->get();

            // get the followers from the club_follow table


            foreach ($followers as $follower) {
                Notification::make()
                    ->title('New Event from ' . $user->name)
                    ->body("{$event->title}.")
                    ->sendToDatabase(User::where('id', $follower->follower_id)->get());
            }
        }
    }
}
