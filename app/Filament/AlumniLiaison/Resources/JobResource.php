<?php

namespace App\Filament\AlumniLiaison\Resources;

use App\Filament\AlumniLiaison\Resources\JobResource\Pages;
use App\Filament\AlumniLiaison\Resources\JobResource\RelationManagers;
use App\Models\Job;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;
use mysql_xdevapi\Schema;

class JobResource extends Resource
{
    protected static ?string $model = Job::class;

    protected static ?string $label = "Vacancy";

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    public static function form(Form $form): Form
    {
        // create form
        if ($form->getOperation() === 'create') {
            return $form
                ->schema([
                    Forms\Components\Section::make('Main Content')->schema(
                        [
                            Forms\Components\TextInput::make('name')
                                ->label('Title')
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

                            Forms\Components\TextInput::make('company')
                                ->label('Company')
                                ->required(),
                        ]
                    )->columns(2),
                    Forms\Components\Section::make('Details')->schema(
                        [
                            FileUpload::make('image')
                                ->image()
                                ->directory('posts/thumbnails'),

                            Forms\Components\RichEditor::make('description')
                                ->label('Description')
                                ->required(),

                            Forms\Components\RichEditor::make('qualifications')
                                ->label('Qualifications')
                                ->required(),

                            Forms\Components\Select::make('faculty')
                                ->options([
                                    'Computing'=>'Computing',
                                    'Business' => 'Business',
                                    'Law' => 'Law',
                                ])
                                ->live()
                                ->label('Related Faculty')
                                ->required(),

                            // user_id
                            Forms\Components\Select::make('user_id')
                                ->label('User')
                                ->relationship('author', 'name')
                                ->searchable()
                                ->default(auth()->id())
                                ->hidden()
                                ->required(),

                            Forms\Components\Toggle::make('approved')
                                ->label('Visibility')
                                ->default(true)
                                ->hidden(fn(Get $get): bool => !$get('faculty')),

                        ]
                    )
                ]);
        }

        // edit form
        return $form
            ->schema([
                Forms\Components\Section::make('Main Content')->schema(
                    [
                        Forms\Components\TextInput::make('name')
                            ->label('Title')
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

                        Forms\Components\TextInput::make('company')
                            ->label('Company')
                            ->required(),
                    ]
                )->columns(2),
                Forms\Components\Section::make('Details')->schema(
                    [
                        FileUpload::make('image')
                            ->image()
                            ->directory('posts/thumbnails'),

                        Forms\Components\RichEditor::make('description')
                            ->label('Description')
                            ->required(),

                        Forms\Components\RichEditor::make('qualifications')
                            ->label('Qualifications')
                            ->required(),

                        Forms\Components\Select::make('faculty')
                            ->label('Related Faculty')
                            ->options([
                                'Computing'=>'Computing',
                                'Business' => 'Business',
                                'Law' => 'Law',
                            ])
                            ->live(),

                        // user_id
                        Forms\Components\Select::make('user_id')
                            ->label('User')
                            ->relationship('author', 'name')
                            ->searchable()
                            ->default(auth()->id())
                            ->hidden()
                            ->required(),

                        Forms\Components\Toggle::make('approved')
                            ->label('Approved')
                            ->default(false)
                            ->live()
                            ->hidden(fn(Get $get): bool => !$get('faculty')),

                        Forms\Components\TextInput::make('reason_for_rejection')
                            ->nullable()
                            ->minLength(1)
                            ->maxLength(150)
                            ->hidden(fn(Get $get): bool => $get('approved') === true),
                    ]
                )
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image'),
                TextColumn::make('name')->label('Title')->sortable()->searchable()->limit(30),
                TextColumn::make('author.name')->sortable()->searchable()->limit(30),
                TextColumn::make('company'),
                IconColumn::make('approved')->sortable()->label('Review Status')->boolean(),
                SelectColumn::make('faculty')->label('Related Faculty')->options([
                    'Computing'=>'Computing',
                    'Business' => 'Business',
                    'Law' => 'Law',
                ])->sortable()->searchable()->disabled(),
                TextColumn::make('reason_for_rejection')->label('Reason For Rejection')->sortable()->limit(20),

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
            'index' => Pages\ListJobs::route('/'),
            'create' => Pages\CreateJob::route('/create'),
            'edit' => Pages\EditJob::route('/{record}/edit'),
        ];
    }
}
