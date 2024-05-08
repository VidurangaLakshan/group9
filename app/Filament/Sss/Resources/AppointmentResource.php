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

                Forms\Components\Section::make('Appointment Details')->schema([

                    Forms\Components\Select::make('mode')
                        ->options([
                            1 => 'Physical Meeting (At APIIT City Campus)',
                            2 => 'MS Teams Chat',
                            3 => 'MS Teams Call',
                        ])
                        ->afterStateUpdated(function (string $operation, $state, Forms\Set $set) {
                            if ($state == 2) {
                                $set('step1', 'Download MS Teams from the App Store or Google Play Store');
                                $set('step2', 'Sign in with your APIIT email address');
                                $set('step3', 'Search \'sss@apiit.lk\' and open the chat');
                                $set('step4', 'Start the chat with your concerns');
                                $set('step5', 'Wait for the counsellor to join the chat / call');}
                            $set('slot_token', Str::slug($state));
                        })
                        ->live()
                        ->required(),



                    Forms\Components\DatePicker::make('date')

                        //hidden until mode is selected is 2
                        ->hidden(function (Forms\Get $get) {
                            return ($get('mode') != 1 && $get('mode') != 3);
                        })
                        ->native(false)

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
                        ->live()
                        ->hidden(fn(Forms\Get $get) => !$get('date'))
                        ->hidden(function (Forms\Get $get) {
                            $date = $get('date');
                            $timeSlot = $get('time_slot');

                            // Query the database to check if a record with the selected date and time slot of 1 exists
                            $exists = Appointment::where('date', $date)
                                ->where('time_slot', $timeSlot)
                                ->exists();

                            return $exists;
                        })
                        ->hidden(function (Forms\Get $get) {
                            return ($get('mode') != 1 && $get('mode') != 3);
                        })
                        ->required(),
                ]),

                Forms\Components\Section::make('Additional Details')

                    ->hidden(function (Forms\Get $get) {
                        return $get('mode') == 2; // Assuming 2 is the value for 'MS Teams Chat'
                    })

                    ->schema([


                    Forms\Components\Select::make('category')
                        ->options([
                            'Personal Counselling' => 'Personal Counselling',
                            'Family Concerns' => 'Family Concerns',
                            'Relationship Concerns' => 'Relationship Concerns',
                            'Grievances' => 'Grievances',
                            'Academic Counselling' => 'Academic Counselling',
                            'Physical Wellbeing Concerns' => 'Physical Wellbeing Concerns',
                            'Learning Disabilities' => 'Learning Disabilities',
                            'Equality / Diversity / Inclusion' => 'Equality / Diversity / Inclusion',
                            'Others' => 'Others',
                        ])
                        ->live()
                        ->required(),

                    Forms\Components\TextInput::make('contact')
                        ->label('Contact No. for Reaching Out')
                        ->required(),
                ]),

                Forms\Components\Section::make('How To Chat on MS Teams')

                    ->hidden(function (Forms\Get $get) {
                        return $get('mode') != 2; // Assuming 2 is the value for 'MS Teams Chat'
                    })

                    ->schema([

                    Forms\Components\TextInput::make('step1')->readOnly()->label('Step 1')
                        ->placeholder('1. Download MS Teams from the App Store or Google Play Store'),

                    Forms\Components\TextInput::make('step2')->readOnly()->label('Step 2')
                        ->placeholder('2. Sign in with your APIIT email address'),

                    Forms\Components\TextInput::make('step3')->readOnly()->label('Step 3')
                        ->placeholder('3. Search \'sss@apiit.lk\' and open the chat'),

                    Forms\Components\TextInput::make('step4')->readOnly()->label('Step 4')
                        ->placeholder('4. Start the chat with your concerns'),

                    Forms\Components\CheckboxList::make('step3_concerns')->label('List of Concerns')->disabled()
                        ->options([
                            'Personal Counselling' => 'Personal Counselling',
                            'Family Concerns' => 'Family Concerns',
                            'Relationship Concerns' => 'Relationship Concerns',
                            'Grievances' => 'Grievances',
                            'Academic Counselling' => 'Academic Counselling',
                            'Physical Wellbeing Concerns' => 'Physical Wellbeing Concerns',
                            'Learning Disabilities' => 'Learning Disabilities',
                            'Equality / Diversity / Inclusion' => 'Equality / Diversity / Inclusion',
                            'Others' => 'Others',
                        ]),

                    Forms\Components\TextInput::make('step5')->readOnly()
                        ->placeholder('4. Wait for the counsellor to reply to the chat'),

                ]),

            ]);

    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.fullName')->label('Name')->limit(50)
                    ->searchable()
                    ->sortable(),
                Tables\Columns\SelectColumn::make('mode')
                    ->options([
                        1 => 'Physical Meeting (At APIIT City Campus)',
                        2 => 'MS Teams Chat',
                        3 => 'MS Teams Call',
                    ])
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('category')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('date')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\SelectColumn::make('time_slot')->label('Time Slot')->disabled() // if time slot is 1, show 10:00 AM - 10:30 AM
                ->options([
                    '1' => '10:00 AM - 10:30 AM',
                    '2' => '10:30 AM - 11:00 AM',
                    '3' => '11:00 AM - 11:30 AM',
                    '4' => '11:30 AM - 12:00 PM',
                    '5' => '12:00 PM - 12:30 PM',
                    '6' => '12:30 PM - 01:00 PM',
                    '7' => '01:00 PM - 01:30 PM',
                    '8' => '01:30 PM - 02:00 PM',
                ])
                    ->searchable()
                    ->sortable(),
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

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()

            ->where('mode', '!=', 2);
    }
}
