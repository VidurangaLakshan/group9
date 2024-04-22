<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Database\Schema\Grammars\RenameColumn;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    public static function form(Form $form): Form
    {
        // if the create operation is in use, show the password field

        if ($form->getOperation() == 'create') {
            return $form
                ->schema([
                    TextInput::make('name')->required()->minLength(1)->maxLength(150),
                    TextInput::make('email')->required()->email()->unique(ignoreRecord: true),
                    // create a select field for the role
                    Select::make('role')
//                        ->relationship('role', 'name')
//                        ->required()
                        // dont allow the user to change the role of the admin
                        ->placeholder('Select a role')
                        ->options([
                            1 => 'Administrator',
                            2 => 'Editor',
//                        3 => 'Student Support Services',
                            4 => 'Head of Alumni Liaison & Industry Relations',
//                        5 => 'Student',
//                        6 => 'Alumni',
                        ]),
                    Forms\Components\Toggle::make('approved')->label('Approved')->default(true),

                ]);
        }

        // if the user is not an admin, don't show the password field

//        dd($form->getRecord()->getAttribute('role')->value);
        if ($form->getRecord()->getAttribute('id') == auth()->user()->id) {
            return $form
                ->schema([
                    TextInput::make('name'),
                    TextInput::make('email'),
                ]);
        } else {
            return $form
                ->schema([
                    TextInput::make('name')
                        ->required()
                        ->minLength(1)
                        ->maxLength(150)
                        ->disabled(),

                    TextInput::make('fullName')
                        ->required()
                        ->minLength(1)
                        ->maxLength(150),

                    TextInput::make('email')
                        ->required()
                        ->email()
                        ->unique(ignoreRecord: true)
                        ->disabled(),

                    // create a select field for the role
                    Select::make('role')
                        ->required()->live()->disabled()
                        ->options([
                            1 => 'Administrator',
                            2 => 'Editor',
//                            3 => 'Student Support Services',
                            4 => 'Head of Alumni Liaison & Industry Relations',
                            5 => 'Academics',
                            6 => 'Non-Academics',
                            7 => 'Student',
                            8 => 'Alumni',
                            9 => 'Student' // On Semester Break
                        ]),

                    TextInput::make('nic')
                        ->minLength(1)
                        ->maxLength(12)
                        ->disabled()
                        ->hidden(fn(Get $get): bool => $get('role') == 1 || $get('role') == 2 || $get('role') == 4 || $get('role') == 7),

                    Select::make('graduation_year')
                        ->required()
                        ->hidden(fn(Get $get): bool => $get('role') == 1 || $get('role') == 2 || $get('role') == 4 || $get('role') == 5 || $get('role') == 6 || $get('role') == 7)
                        ->options(array_combine(range(date("Y"), 2002), range(date("Y"), 2002))),

                    Select::make('degree_level')
                        ->required()
                        ->live()
                        ->hidden(fn(Get $get): bool => $get('role') == 1 || $get('role') == 2 || $get('role') == 4 || $get('role') == 5 || $get('role') == 6 || $get('role') == 8)
                        ->options([
                            1 => 'Foundation (Semester 1)',
                            2 => 'Foundation (Semester 2)',
                            3 => 'L4 (Semester 1)',
                            4 => 'L4 (Semester 2)',
                            5 => 'L5 (Semester 1)',
                            6 => 'L5 (Semester 2)',
                            7 => 'L6 (Semester 1)',
                            8 => 'L6 (Semester 2)',
                        ]),

                    Select::make('faculty')
                        ->required()
                        ->hidden(fn(Get $get): bool => $get('role') == 1 || $get('role') == 2 || $get('role') == 4 || $get('role') == 6 || $get('role') == 8 || $get('degree_level') == 1 || $get('degree_level') == 2)
                        ->options([
                            1 => 'School of Computing',
                            2 => 'School of Business',
                            3 => 'Law School',
                        ]),

                    Forms\Components\Toggle::make('approved')
                        ->label('Approved')
                        ->default(false),
                ]);
        }
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\IconColumn::make('approved')->boolean()->toggleable(isToggledHiddenByDefault: false)->sortable(),
                TextColumn::make('name')->sortable()->searchable(isIndividual: true, isGlobal: false)->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('fullName')->sortable()->searchable(isIndividual: true, isGlobal: false)->toggleable(isToggledHiddenByDefault: false),
                TextColumn::make('role')->sortable()->searchable(isIndividual: true, isGlobal: false)->toggleable(isToggledHiddenByDefault: false),
                TextColumn::make('graduation_year')->sortable()->searchable(isIndividual: true, isGlobal: false)->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\SelectColumn::make('degree_level')->options([
                    1 => 'Foundation (Semester 1)',
                    2 => 'Foundation (Semester 2)',
                    3 => 'L4 (Semester 1)',
                    4 => 'L4 (Semester 2)',
                    5 => 'L5 (Semester 1)',
                    6 => 'L5 (Semester 2)',
                    7 => 'L6 (Semester 1)',
                    8 => 'L6 (Semester 2)',
                ])->sortable()->disabled()->searchable(isIndividual: true, isGlobal: false)->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\SelectColumn::make('faculty')->options([
                    1 => 'School of Computing',
                    2 => 'School of Business',
                    3 => 'Law School',
                ])->sortable()->disabled()->searchable(isIndividual: true, isGlobal: false)->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\Action::make('Promote Semester')
                        ->action(function (User $record) {
                            if ($record->role->value == 7) {

                                if ($record->degree_level == 8) {
                                    $record->role = 8;
                                }
                                $record->degree_level = $record->degree_level + 1;
                                $record->save();
                            }
                        })
                        ->color('success')
                        ->requiresConfirmation(),
                    Tables\Actions\Action::make('Demote Semester')
                        ->action(function (User $record) {
                            if ($record->role->value == 7) {
                                if ($record->degree_level > 1) {
                                    $record->degree_level = $record->degree_level - 1;
                                    $record->save();
                                }
                            }
                        })
                        ->color('danger')
                        ->requiresConfirmation(),
                    Tables\Actions\Action::make('Set to Computing Faculty')
                        ->action(function (User $record) {
                            if ($record->role->value == 7 || $record->role->value == 5) {
                                $record->faculty = 1;
                                $record->save();
                            }
                        })
                        ->color('success')
                        ->requiresConfirmation(),
                    Tables\Actions\Action::make('Set to Business Faculty')
                        ->action(function (User $record) {
                            if ($record->role->value == 7 || $record->role->value == 5) {
                                $record->faculty = 2;
                                $record->save();
                            }
                        })
                        ->color('success')
                        ->requiresConfirmation(),
                    Tables\Actions\Action::make('Set to Law Faculty')
                        ->action(function (User $record) {
                            if ($record->role->value == 7 || $record->role->value == 5) {
                                $record->faculty = 3;
                                $record->save();
                            }
                        })
                        ->color('success')
                        ->requiresConfirmation(),
                    Tables\Actions\Action::make('Enable Semester Break')
                        ->action(function (User $record) {
                            if ($record->role->value == 7) {
                                $record->role = 9;
                                $record->save();
                            }
                        })
                        ->color('success')
                        ->requiresConfirmation(),
                    Tables\Actions\Action::make('Disable Semester Break')
                        ->action(function (User $record) {
                            if ($record->role->value == 9) {
                                $record->role = 7;
                                $record->save();
                            }
                        })
                        ->color('success')
                        ->requiresConfirmation(),

                ])
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\BulkAction::make('Promote all')
                        ->action(function (Collection $records) {
                            $records->each(function ($record) {
                                if ($record->role->value == 7) {

                                    if ($record->degree_level == 8) {
                                        $record->role = 8;
                                    }
                                    $record->degree_level = $record->degree_level + 1;
                                    $record->save();
                                }
                            });
                        })
                        ->requiresConfirmation()
                        ->deselectRecordsAfterCompletion(),

                    Tables\Actions\BulkAction::make('Set all to Computing School')
                        ->action(function (Collection $records) {
                            $records->each(function ($record) {
                                if ($record->role->value == 7 || $record->role->value == 5) {
                                    $record->faculty = 1;
                                    $record->save();
                                }
                            });
                        })
                        ->requiresConfirmation()
                        ->deselectRecordsAfterCompletion(),

                    Tables\Actions\BulkAction::make('Set all to Business School')
                        ->action(function (Collection $records) {
                            $records->each(function ($record) {
                                if ($record->role->value == 7 || $record->role->value == 5) {
                                    $record->faculty = 2;
                                    $record->save();
                                }
                            });
                        })
                        ->requiresConfirmation()
                        ->deselectRecordsAfterCompletion(),

                    Tables\Actions\BulkAction::make('Set all to Law School')
                        ->action(function (Collection $records) {
                            $records->each(function ($record) {
                                if ($record->role->value == 7 || $record->role->value == 5) {
                                    $record->faculty = 3;
                                    $record->save();
                                }
                            });
                        })
                        ->requiresConfirmation()
                        ->deselectRecordsAfterCompletion(),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
