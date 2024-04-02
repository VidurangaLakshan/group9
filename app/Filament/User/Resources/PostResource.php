<?php

namespace App\Filament\User\Resources;

use App\Filament\User\Resources\PostResource\Pages;
use App\Filament\User\Resources\PostResource\RelationManagers;
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

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
//        dd($form->getOperation());

        if ($form->getOperation() === 'edit') {
            // if the form is saved, then the approved column should be set to false
            $form->getRecord()->setAttribute('approved', false);
        }

//        $form->getRecord()->setAttribute('user_id', auth()->id());
        // when the form is saved, then the author id should be set to the auth()->id() should be set to false

        if ($form->getOperation() === 'create') {

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
                                    ->label('URL')
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

//                        DateTimePicker::make('published_at')->nullable(),
//
//                        CheckBox::make('featured')
//                            ->default(false)
//                            ->afterStateUpdated(function ($state, Forms\Set $set) {
//                                if (Post::where('featured', true)->count() >= 5) {
//                                    $set('featured', false);
//                                }
//                            }),
//
                                CheckBox::make('approved')
                                    ->default(false)
                                    ->hidden(true),


                                // if approved is true, then disable the reason for rejection field


//                            ->afterStateUpdated(function (string $operation, $state, Forms\Set $set) {
//                                if ($operation === 'edit') {
//                                    $set('pending', true);
//                                }
//                            }),
                                // if the count of posts with the featured column set to true is greater than 5, dont let the user set the featured column to true, but can set it to false
                                // ->disabled(fn ($state) => Post::where('featured', true)->count() > 5),

//                                TextInput::make('reason_for_rejection')
//                                    ->nullable()
//                                    ->disabled()
//                                    ->placeholder('IF REJECTED, THE REASON WILL BE DISPLAYED HERE')
//                                    ->minLength(1)
//                                    ->maxLength(150),





                                Select::make('user_id')
                                    ->relationship('author', 'name')
                                    ->default(auth()->id())
                                    //TODO: find a way to disable this field without any errors
//                                ->disabled()
                                    //only get the auth user id, so that the user can't change the author of the post
//                                ->hidden(true)
                                    ->required()
                                    ->searchable(),

//                            Select::make('category_id')

                                //by default set the user_id value to the authenticated user id, dont let the user type anything



//                            ->afterStateUpdated(function (string $operation, $state, Forms\Set $set) {
//                                if ($operation === 'edit') {
//                                    $set('approved', false);
//                                }
//                            }),

                                TextInput::make('custom_categories')
                                    ->label('Categories (comma seperated)')
                                    ->required()

                            ]
                        ),
                    ]
                );

        }

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
                                ->label('URL')
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

//                        DateTimePicker::make('published_at')->nullable(),
//
//                        CheckBox::make('featured')
//                            ->default(false)
//                            ->afterStateUpdated(function ($state, Forms\Set $set) {
//                                if (Post::where('featured', true)->count() >= 5) {
//                                    $set('featured', false);
//                                }
//                            }),
//
                            CheckBox::make('approved')
                                ->default(false)
                                ->hidden(true),


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
                                ->disabled()
                                ->placeholder('IF REJECTED, THE REASON WILL BE DISPLAYED HERE')
                                ->minLength(1)
                                ->maxLength(150),


                            Select::make('user_id')
                                ->relationship('author', 'name')
                                ->default(auth()->id())
                                //TODO: find a way to disable this field without any errors
//                                ->disabled()
                                //only get the auth user id, so that the user can't change the author of the post
//                                ->hidden(true)
                                ->required()
                                ->searchable(),

//                            Select::make('category_id')

                        //by default set the user_id value to the authenticated user id, dont let the user type anything



//                            ->afterStateUpdated(function (string $operation, $state, Forms\Set $set) {
//                                if ($operation === 'edit') {
//                                    $set('approved', false);
//                                }
//                            }),

                            TextInput::make('custom_categories')
                                ->label('Categories (comma seperated)')
                                ->required()

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
//                TextColumn::make('slug')->sortable()->searchable(),
//                TextColumn::make('author.name')->sortable()->searchable(),
                TextColumn::make('published_at')->date('Y-m-d')->sortable()->searchable(),
//                CheckboxColumn::make('featured')->sortable()->disabled(fn ($state) => Post::where('featured', true)->count() >= 5),
//                CheckboxColumn::make('approved')->sortable()->disabled(),
                IconColumn::make('approved')->boolean()->label('Status')->sortable(),
//                IconColumn::make('reason_for_rejection')->label('Reason')->sortable()->placeholder('No reason given'),
                TextColumn::make('categories.title')->sortable()->searchable(),
//                TextColumn::make('reading_time')->sortable(),
//                TextColumn::make('reason_for_rejection')->sortable(),
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

            ->where('user_id', auth()->user()->id)
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
