<?php

namespace App\Filament\Sss\Resources;

use App\Filament\Sss\Resources\AppointmentResource\Pages;
use App\Filament\Sss\Resources\AppointmentResource\RelationManagers;
use App\Models\Appointment;
use App\Models\Holiday;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class AppointmentResource extends Resource
{
    protected static ?string $model = Appointment::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\DatePicker::make('date')
                    ->native(false)

//                    ->afterStateUpdated(function (string $operation, $state, Forms\Set $set) {
//                        $set('slot_token', Str::slug($state));
//                    })

                    // write a function to get all  weekends and put it to an array and disable those days
                    ->disabledDates(function () {

                        // access a table and fill the specific dates array
                        $specificDates = Holiday::where('date', '>', now())->pluck('date')->toArray();

                        $start = Carbon::now();
                        $end = $start->copy()->addYears(5);
                        $period = CarbonPeriod::create($start, $end);

                        $weekends = [];
                        foreach ($period as $date) {
                            if ($date->isWeekend()) {
                                $weekends[] = $date->format('Y-m-d');
                            }
                        }

                        // Merge specific dates and weekends into a single array
                        $disabledDates = array_merge($specificDates, $weekends);

                        return $disabledDates;
                    })

                    // disable all days before today
                    ->minDate(today())

                    ->live()
                    ->required(),

                Forms\Components\Select::make('time_slot')

                    ->options(function (Forms\Get $get) {
                        $date = $get('date');
                        $options = [
                            '1' => '10:00 AM - 10:30 AM',
                            '2' => '10:30 AM - 11:00 AM',
                            '3' => '11:00 AM - 11:30 AM',
                            '4' => '11:30 AM - 12:00 PM',
                            '5' => '12:00 PM - 12:30 PM',
                            '6' => '12:30 PM - 01:00 PM',
                            '7' => '01:00 PM - 01:30 PM',
                            '8' => '01:30 PM - 02:00 PM',
                        ];
//
                        foreach ($options as $key => $value) {
                            $slotToken = Str::slug($date) . '-' . $key;
                            $exists = Appointment::where('slot_token', 'like', $slotToken . '%')->exists();
                            if ($exists) {
                                unset($options[$key]);
                            }
                        }
//
                        return $options;
                    })

//                    ->options([
//                        '1' => '10:00 AM - 10:30 AM',
//                        '2' => '10:30 AM - 11:00 AM',
//                        '3' => '11:00 AM - 11:30 AM',
//                        '4' => '11:30 AM - 12:00 PM',
//                        '5' => '12:00 PM - 12:30 PM',
//                        '6' => '12:30 PM - 01:00 PM',
//                        '7' => '01:00 PM - 01:30 PM',
//                        '8' => '01:30 PM - 02:00 PM',
//                    ])
                    ->live()
                    ->hidden(fn (Forms\Get $get) => !$get('date'))

                    ->hidden(function (Forms\Get $get) {
                        $date = $get('date');
                        $timeSlot = $get('time_slot');

                        // Query the database to check if a record with the selected date and time slot of 1 exists
                        $exists = Appointment::where('date', $date)
                            ->where('time_slot', $timeSlot)
                            ->exists();

                        return $exists;
                    })

//                    ->afterStateUpdated(function (string $operation, $state, Forms\Set $set, Forms\Get $get) {
//                        $date = Str::slug($get('date'));
//                        $state = $date . '-' . $state;
//                        $set('slot_token', Str::slug($state));
//                    })
                    ->required(),

//                Forms\Components\TextInput::make('slot_token')
//                    ->readOnly()
//                    ->unique()
//                    ->required(),

                Forms\Components\Select::make('contact')
                    ->options([
                        'email' => 'Email',
                        'phone' => 'Phone',
                    ])
                    ->live()
                    ->required(),

                Forms\Components\Select::make('mode')
                    ->options([
                        'online' => 'Online',
                        'offline' => 'Offline',
                    ])
                    ->live()
                    ->required(),

                Forms\Components\Select::make('category')
                    ->options([
                        'general' => 'General',
                        'specific' => 'Specific',
                    ])
                    ->live()
                    ->required(),

                Forms\Components\Select::make('location')
                    ->options([
                        'office' => 'Office',
                        'home' => 'Home',
                    ])
                    ->live()
                    ->required(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAppointments::route('/'),
            'create' => Pages\CreateAppointment::route('/create'),
            'edit' => Pages\EditAppointment::route('/{record}/edit'),
        ];
    }
}
