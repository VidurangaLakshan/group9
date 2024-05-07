<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EventResource\Pages;
use App\Filament\Resources\EventResource\RelationManagers;
use App\Models\Event;
use App\Models\Holiday;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class EventResource extends Resource
{
    protected static ?string $model = Event::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        if ($form->getOperation() === 'edit'){
            return $form
                ->schema([
                    Forms\Components\TextInput::make('title')
                        ->required()->minLength(1)->maxLength(150),

                    Forms\Components\TextInput::make('slug')
                        ->required(),

                    Forms\Components\Textarea::make('description')
                        ->columnSpanFull()
                        ->required(),

                    Forms\Components\Toggle::make('same_day')
                        ->columnSpanFull()
                        ->default(false)
                        ->live()
                        ->label('Same Day Event'),

                    Forms\Components\DatePicker::make('start_date')
                        ->label('Start Date')
                        ->native(false)
                        ->live()
                        ->required(),

                    Forms\Components\DatePicker::make('end_date')
                        ->label('End Date')
                        ->native(false)
                        ->minDate(fn(Get $get): string => Carbon::parse($get('start_date'))->addDay())
                        ->hidden(fn(Get $get): bool => $get('same_day') === true)
                        ->required(),

                    Forms\Components\Toggle::make('same_time')
                        ->columnSpanFull()
                        ->default(false)
                        ->live()
                        ->label('No Specified Finish Time'),


                    Forms\Components\TimePicker::make('start_time')
                        ->label('Start Time')
                        ->required(),

                    Forms\Components\TimePicker::make('end_time')
                        ->label('End Time')
                        ->minDate(fn(Get $get): string => Carbon::parse($get('start_time'))->addMinute())
                        ->hidden(fn(Get $get): bool => $get('same_time') === true)
                        ->required(),

                    Forms\Components\TextInput::make('location')
                        ->label('Location')
                        ->columnSpanFull()
                        ->required(),

                    Forms\Components\FileUpload::make('thumbnail')
                        ->label('Thumbnail')
                        ->image()
                        ->imageResizeMode('cover')
                        ->imageEditor()
                        ->imageCropAspectRatio('1:1')
                        ->columnSpanFull()
                        ->required(),

                    Forms\Components\RichEditor::make('gallery_images')
                        ->label('Gallery Images')
                        ->columnSpanFull()
                        ->toolbarButtons([
                            'attachFiles',
                        ]),

                    Forms\Components\Toggle::make('status')
                        ->columnSpanFull()
                        ->label('Visibility'),
                ]);
        }

        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->live()
                    ->required()->minLength(1)->maxLength(150)
                    ->afterStateUpdated(function (string $operation, $state, Forms\Set $set) {
                        $set('slug', Str::slug($state));
                    }),

                Forms\Components\TextInput::make('slug')
                    ->required(),

                Forms\Components\Textarea::make('description')
                    ->columnSpanFull()
                    ->required(),

                Forms\Components\Toggle::make('same_day')
                    ->columnSpanFull()
                    ->default(false)
                    ->live()
                    ->label('Same Day Event'),

                Forms\Components\DatePicker::make('start_date')
                    ->label('Start Date')
                    ->native(false)

                    // disable all days before today
                    ->minDate(today())

                    ->live()
                    ->required(),

                Forms\Components\DatePicker::make('end_date')
                    ->label('End Date')
                    ->native(false)
                    ->minDate(fn(Get $get): string => Carbon::parse($get('start_date'))->addDay())
                    ->hidden(fn(Get $get): bool => $get('same_day') === true)
                    ->required(),

                Forms\Components\Toggle::make('same_time')
                    ->columnSpanFull()
                    ->default(false)
                    ->live()
                    ->label('No Specified Finish Time'),


                Forms\Components\TimePicker::make('start_time')
                    ->label('Start Time')
                    ->required(),

                Forms\Components\TimePicker::make('end_time')
                    ->label('End Time')
                    ->minDate(fn(Get $get): string => Carbon::parse($get('start_time'))->addMinute())
                    ->hidden(fn(Get $get): bool => $get('same_time') === true)
                    ->required(),

                Forms\Components\TextInput::make('location')
                    ->label('Location')
                    ->columnSpanFull()
                    ->required(),

                Forms\Components\FileUpload::make('thumbnail')
                    ->label('Thumbnail')
                    ->image()
                    ->imageResizeMode('cover')
                    ->imageEditor()
                    ->imageCropAspectRatio('1:1')
                    ->columnSpanFull()
                    ->required(),

                Forms\Components\RichEditor::make('gallery_images')
                    ->label('Gallery Images')
                    ->columnSpanFull()
                    ->toolbarButtons([
                        'attachFiles',
                    ]),

                Forms\Components\Toggle::make('status')
                    ->columnSpanFull()
                    ->label('Visibility'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //event image
                Tables\Columns\ImageColumn::make('thumbnail')
                    ->label('Image'),
                // event name
                Tables\Columns\TextColumn::make('title')->limit(40)
                    ->searchable()
                    ->sortable(),
                //event owner
                TextColumn::make('author.name')->sortable()->searchable()->limit(40),
                //event start date
                Tables\Columns\TextColumn::make('start_date')
                    ->searchable()
                    ->sortable(),
                //event visibility
                Tables\Columns\IconColumn::make('status')
                    ->label('Visibility')
                    ->boolean()
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
            'index' => Pages\ListEvents::route('/'),
            'create' => Pages\CreateEvent::route('/create'),
            'edit' => Pages\EditEvent::route('/{record}/edit'),
        ];
    }
}
