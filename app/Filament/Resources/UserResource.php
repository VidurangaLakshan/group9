<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        // if the create operation is in use, show the password field

        if ($form->getOperation() == 'create') {
            return $form
                ->schema([
                    TextInput::make('name')->required()->minLength(1)->maxLength(150),
//                    TextInput::make('password')->required()->minLength(8)->password(bcrypt('aaAA12!@'))->placeholder('aaAA12!@'),
                    TextInput::make('email')->required()->email()->unique(ignoreRecord: true),
                ]);
        }

        // if the user is not an admin, don't show the password field

        if ($form->getRecord()->getAttribute('name') == 'Administrator') {
            return $form
                ->schema([
                    TextInput::make('name')->required()->minLength(1)->maxLength(150),
//                    TextInput::make('password')->required()->minLength(8)->password(bcrypt('aaAA12!@'))->placeholder('aaAA12!@'),
                    TextInput::make('email')->required()->email()->unique(ignoreRecord: true),
                    //TODO: Add a jetstream link to change the admins password
                ]);
        } else {
            return $form
                ->schema([
                    TextInput::make('name')->required()->minLength(1)->maxLength(150),
                    TextInput::make('email')->required()->email()->unique(ignoreRecord: true),
                ]);
        }
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->sortable()->searchable(),
                TextColumn::make('email')->sortable()->searchable(),
                TextColumn::make('role')->sortable()->searchable(),
                // if the email of the user is "admin@admin.com", set the role to admin


                //TODO: Add a column for the role
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
