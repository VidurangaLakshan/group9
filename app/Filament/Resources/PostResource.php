<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Filament\Resources\PostResource\RelationManagers;
use App\Models\Post;
use Filament\Forms;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\CheckboxColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Main Content')->schema(
                    [
                        TextInput::make('title')
                            ->live()
                            ->required()->minLength(1)->maxLength(150)
                            ->afterStateUpdated(function (string $operation, $state, Forms\Set $set) {
                                if ($operation === 'edit') {
                                    $set('approved', false);
                                    return;
                                }
                                $set('slug', Str::slug($state));
                            }),
                        TextInput::make('slug')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->minLength(1)
                            ->maxLength(150)
                            ->afterStateUpdated(function (string $operation, $state, Forms\Set $set) {
                                if ($operation === 'edit') {
                                    $set('approved', false);
                                }
                            }),
                        RichEditor::make('body')
                            ->required()
                            ->fileAttachmentsDirectory('posts/images')
                            ->columnSpanFull()
                            ->afterStateUpdated(function (string $operation, $state, Forms\Set $set) {
                                if ($operation === 'edit') {
                                    $set('approved', false);
                                }
                            }),

                    ]
                )->columns(2),
                Section::make('Meta')->schema(
                    [
                        FileUpload::make('image')
                            ->image()
                            ->directory('posts/thumbnails')
                            ->afterStateUpdated(function (string $operation, $state, Forms\Set $set) {
                                if ($operation === 'edit') {
                                    $set('approved', false);
                                }
                            }),

                        DateTimePicker::make('published_at')->nullable(),

                        CheckBox::make('featured')
                            ->default(false)
                            ->afterStateUpdated(function ($state, Forms\Set $set) {
                                if (Post::where('featured', true)->count() >= 5) {
                                    $set('featured', false);
                                }
                            }),

//                        CheckBox::make('approved')
//                            ->default(false),

                        Toggle::make('approved')
                            ->default(false),
                        // if approved is true, then disable the reason for rejection field


//                            ->afterStateUpdated(function (string $operation, $state, Forms\Set $set) {
//                                if ($operation === 'edit') {
//                                    $set('pending', true);
//                                }
//                            }),
                        // if the count of posts with the featured column set to true is greater than 5, dont let the user set the featured column to true, but can set it to false
                        // ->disabled(fn ($state) => Post::where('featured', true)->count() > 5),

                        TextInput::make('reason_for_rejection')
                            ->nullable()
                            ->placeholder('Only if the post is NOT APPROVED')
                            ->minLength(1)
                            ->maxLength(150),

                        Select::make('user_id')
                            ->relationship('author', 'name')
                            ->searchable()
                            ->required()
                            ->afterStateUpdated(function (string $operation, $state, Forms\Set $set) {
                                if ($operation === 'edit') {
                                    $set('approved', false);
                                }
                            }),
                        Select::make('categories')
                            ->relationship('categories', 'title')
                            ->searchable()
                            ->multiple()
                            ->required()
                            ->afterStateUpdated(function (string $operation, $state, Forms\Set $set) {
                                if ($operation === 'edit') {
                                    $set('approved', false);
                                }
                            }),
                    ]
                ),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image'),
                TextColumn::make('title')->sortable()->searchable(),
                TextColumn::make('slug')->sortable()->searchable(),
                TextColumn::make('author.name')->sortable()->searchable(),
                TextColumn::make('published_at')->date('Y-m-d')->sortable()->searchable(),
                CheckboxColumn::make('featured')->sortable()->disabled(fn ($state) => Post::where('featured', true)->count() >= 5),
                Tables\Columns\ToggleColumn::make('approved')->sortable(),
                TextColumn::make('categories.title')->sortable()->searchable(),
                TextColumn::make('reading_time')->sortable(),
                TextColumn::make('reason_for_rejection')->sortable(),



            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
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
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
