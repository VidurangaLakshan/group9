<?php

namespace App\Filament\Club\Resources;

use App\Filament\Club\Resources\CommentResource\Pages;
use App\Filament\Club\Resources\CommentResource\RelationManagers;
use App\Models\Comment;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CommentResource extends Resource
{
    protected static ?string $model = Comment::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-bottom-center';

    public static function form(Form $form): Form
    {

        if (auth()->user()->role->value == 9 && $form->getOperation() === 'edit') {
            if (auth()->user()->id != $form->getRecord()->user_id) {
                return $form
                    ->schema([
                        Forms\Components\Select::make('user_id')
                            ->relationship('user', 'name')
                            ->searchable()
                            ->disabled()
                            ->preload()
                            ->required(),
                        Forms\Components\Select::make('post_id')
                            ->relationship('post', 'title')
                            ->searchable()
                            ->preload()
                            ->disabled()
                            ->required(),
                        Forms\Components\TextInput::make('comment')
                            ->label('Comment')
                            ->required()
                            ->disabled()
                            ->minLength(1)
                            ->maxLength(255),
                    ]);
            } else {
                return $form
                    ->schema([
                        Forms\Components\Select::make('user_id')
                            ->relationship('user', 'name')
                            ->searchable()
                            ->disabled()
                            ->preload()
                            ->hidden(),
                        Forms\Components\Select::make('post_id')
                            ->relationship('post', 'title')
                            ->searchable()
                            ->preload()
                            ->disabled()
                            ->required(),
                        Forms\Components\TextInput::make('comment')
                            ->label('Comment')
                            ->required()
                            ->disabled()
                            ->minLength(1)
                            ->maxLength(255),
                    ]);
            }
        }

        if (auth()->user()->role->value == 9 && $form->getOperation() === 'create') {
            return $form
                ->schema([
                    Forms\Components\Select::make('user_id')
                        ->relationship('user', 'name')
                        ->searchable()
                        ->preload()
                        ->hidden(),
                    Forms\Components\Select::make('post_id')
                        ->relationship('post', 'title')
                        ->searchable()
                        ->preload()
                        ->placeholder('This field is disabled for students on semester break !!')
                        ->disabled()
                        ->required(),
                    Forms\Components\TextInput::make('comment')
                        ->label('Comment')
                        ->required()
                        ->disabled()
                        ->placeholder('This field is disabled for students on semester break !!')
                        ->minLength(1)
                        ->maxLength(255),
                ]);

        }


        if ($form->getOperation() === 'edit') {
            if (auth()->user()->id != $form->getRecord()->user_id) {
                return $form
                    ->schema([
                        Forms\Components\Select::make('user_id')
                            ->relationship('user', 'name')
                            ->searchable()
                            ->disabled()
                            ->preload()
                            ->required(),
                        Forms\Components\Select::make('post_id')
                            ->relationship('post', 'title')
                            ->searchable()
                            ->preload()
                            ->disabled()
                            ->required(),
                        Forms\Components\TextInput::make('comment')
                            ->label('Comment')
                            ->required()
                            ->disabled()
                            ->minLength(1)
                            ->maxLength(255),
                    ]);
            } else {
                return $form
                    ->schema([
                        Forms\Components\Select::make('user_id')
                            ->relationship('user', 'name')
                            ->searchable()
                            ->disabled()
                            ->preload()
                            ->hidden(),
                        Forms\Components\Select::make('post_id')
                            ->relationship('post', 'title')
                            ->searchable()
                            ->preload()
                            ->disabled()
                            ->required(),
                        Forms\Components\TextInput::make('comment')
                            ->label('Comment')
                            ->required()
                            ->minLength(1)
                            ->maxLength(255),
                    ]);
            }
        }


        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name')
                    ->searchable()
                    ->preload()
                    ->hidden(),
                Forms\Components\Select::make('post_id')
                    ->relationship('post', 'title')
                    ->searchable()
                    ->preload()
                    ->required(),
                Forms\Components\TextInput::make('comment')
                    ->label('Comment')
                    ->required()
                    ->minLength(1)
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('post.title')->searchable()->sortable()->limit(30),
                Tables\Columns\TextColumn::make('comment')->searchable()->sortable()->limit(30),
                Tables\Columns\TextColumn::make('created_at')->label('Created At')->date('Y-m-d')->searchable()->sortable(),
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
            'index' => Pages\ListComments::route('/'),
            'create' => Pages\CreateComment::route('/create'),
            'edit' => Pages\EditComment::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->where('user_id', auth()->user()->id);

    }
}
