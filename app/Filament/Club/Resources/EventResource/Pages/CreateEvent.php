<?php

namespace App\Filament\Club\Resources\EventResource\Pages;

use App\Filament\Club\Resources\EventResource;
use App\Models\User;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\DB;

class CreateEvent extends CreateRecord
{
    protected static string $resource = EventResource::class;

    public function afterCreate(): void
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
