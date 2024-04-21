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
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\CheckboxColumn;
use Filament\Tables\Columns\IconColumn;
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
        // create form
        if ($form->getOperation() === 'create') {
            return $form
                ->schema([
                        Section::make('Main Content')->schema(
                            [
                                TextInput::make('title')
                                    ->live()
                                    ->required()->minLength(1)->maxLength(150)
                                    ->afterStateUpdated(function (string $operation, $state, Forms\Set $set) {
                                        $set('slug', Str::slug($state));
                                    }),

                                TextInput::make('slug')
                                    ->label('URL')
                                    ->required()
                                    ->unique(ignoreRecord: true)
                                    ->minLength(1)
                                    ->maxLength(150),

                                RichEditor::make('body')
                                    ->required()
                                    ->fileAttachmentsDirectory('posts/images')
                                    ->columnSpanFull(),
                            ]
                        )->columns(2),
                        Section::make('Meta')->schema(
                            [
                                FileUpload::make('image')
                                    ->image()
                                    ->directory('posts/thumbnails'),

                                DateTimePicker::make('published_at')->nullable(),

                                CheckBox::make('featured')
                                    ->default(false),

                                Select::make('user_id')
                                    ->relationship('author', 'name')
                                    ->searchable()
                                    ->hidden(),

                                Select::make('categories')
                                    ->label('Categories (Add the faculty first)')
                                    ->relationship('categories', 'title')
                                    ->multiple()
                                    ->live(),

                                Toggle::make('approved')
                                    ->default(true)
                                    ->hidden(fn(Get $get): bool => !$get('categories')),
                            ]
                        ),
                    ]
                );

        }

        // edit form
        return $form
            ->schema([
                    Section::make('Main Content')->schema(
                        [
                            TextInput::make('title')
                                ->live()
                                ->required()->minLength(1)->maxLength(150)
                                ->afterStateUpdated(function (string $operation, $state, Forms\Set $set) {
                                    $set('slug', Str::slug($state));
                                }),

                            TextInput::make('slug')
                                ->label('URL')
                                ->required()
                                ->unique(ignoreRecord: true)
                                ->minLength(1)
                                ->maxLength(150),

                            RichEditor::make('body')
                                ->required()
                                ->fileAttachmentsDirectory('posts/images')
                                ->columnSpanFull(),
                        ]
                    )->columns(2),
                    Section::make('Meta')->schema(
                        [
                            FileUpload::make('image')
                                ->image()
                                ->directory('posts/thumbnails'),

                            DateTimePicker::make('published_at')->nullable(),

                            CheckBox::make('featured')
                                ->default(false),

                            Select::make('user_id')
                                ->relationship('author', 'name')
                                ->disabled(),

                            Select::make('categories')
                                ->label('Categories (Add the faculty first)')
                                ->relationship('categories', 'title')
                                ->multiple()
                                ->live(),

                            TextInput::make('custom_categories')
                                ->label('User Defined Categories')
                                ->placeholder('no user defined categories found')
                                ->live()
                                ->disabled(),

                            Toggle::make('approved')
                                ->default(false)
                                ->live()
                                ->hidden(fn (Get $get): bool => ! $get('categories')),

                            TextInput::make('reason_for_rejection')
                                ->nullable()
                                ->minLength(1)
                                ->hidden()
                                ->maxLength(150)
                                ->hidden(fn (Get $get): bool => $get('approved') === true),
                        ]
                    ),
                ]
            );
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image'),
                TextColumn::make('title')->sortable()->searchable()->limit(30),
                TextColumn::make('author.name')->sortable()->searchable(),
                TextColumn::make('published_at')->date('Y-m-d')->sortable()->searchable(),
                IconColumn::make('featured')->boolean()->sortable(),
                IconColumn::make('approved')->boolean()->sortable()->label('Review Status'),
                TextColumn::make('categories.title')->sortable()->searchable(),
                TextColumn::make('reason_for_rejection')->label('Reason For Rejection')->sortable()->limit(20),


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
