<?php

namespace App\Filament\AlumniLiaison\Resources;

use App\Filament\AlumniLiaison\Resources\PostResource\Pages;
use App\Filament\AlumniLiaison\Resources\PostResource\RelationManagers;
use App\Models\Post;
use Filament\Forms;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
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

    protected static ?string $label = 'Article';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        if ($form->getOperation() === 'edit') {
            $form->getRecord()->setAttribute('approved', false);
        }

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
                                    ->default(false)
                                    ->hidden(true),

                                CheckBox::make('approved')
                                    ->default(false)
                                    ->hidden(true),

                                Select::make('user_id')
                                    ->relationship('author', 'name')
                                    ->searchable()
                                    ->hidden(),

                                TextInput::make('custom_categories')
                                    ->label('Categories (comma seperated)')
                                    ->required()

                            ]
                        ),
                    ]
                );

        }

        if ($form->getRecord()->reason_for_rejection !== null) {
            return $form
                ->schema([
                        Section::make('Main Content')->schema(
                            [
                                TextInput::make('title')
                                    ->required()->minLength(1)->maxLength(150),

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
                                    ->default(false)
                                    ->hidden(true),

                                CheckBox::make('approved')
                                    ->default(false)
                                    ->hidden(true),

                                TextInput::make('reason_for_rejection')
                                    ->nullable()
                                    ->disabled()
                                    ->minLength(1)
                                    ->maxLength(150),

                                Select::make('user_id')
                                    ->relationship('author', 'name')
                                    ->searchable()
                                    ->hidden()
                                    ->required(),

                                Select::make('categories')
                                    ->relationship('categories', 'title')
                                    ->multiple(),

                                TextInput::make('custom_categories')
                                    ->label('Categories (comma seperated)')
                                    ->required(),


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
                                ->required()->minLength(1)->maxLength(150),

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
                                ->default(false)
                                ->hidden(true),

                            CheckBox::make('approved')
                                ->default(false)
                                ->hidden(true),

                            TextInput::make('reason_for_rejection')
                                ->nullable()
                                ->minLength(1)
                                ->hidden()
                                ->maxLength(150),

                            Select::make('user_id')
                                ->relationship('author', 'name')
                                ->searchable()
                                ->hidden()
                                ->required(),

                            Select::make('categories')
                                ->relationship('categories', 'title')
                                ->multiple(),

                            TextInput::make('custom_categories')
                                ->label('Categories (comma seperated)')
                                ->required(),


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
                TextColumn::make('title')->sortable()->searchable()->limit(40),
                TextColumn::make('published_at')->date('Y-m-d')->sortable()->searchable(),
                IconColumn::make('approved')->boolean()->label('Review Status')->sortable(),
                IconColumn::make('reason_for_rejection')->sortable(),
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
                    Tables\Actions\ForceDeleteBulkAction::make(),
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

            ->where('user_id', auth()->user()->id)
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
