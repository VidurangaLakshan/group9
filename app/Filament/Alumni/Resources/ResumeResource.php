<?php

namespace App\Filament\Alumni\Resources;

use App\Filament\Alumni\Resources\ResumeResource\Pages;
use App\Filament\Alumni\Resources\ResumeResource\RelationManagers;
use App\Models\Resume;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ResumeResource extends Resource
{
    protected static ?string $model = Resume::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\FileUpload::make('resume')
                    ->label('Attach Resume')
                    ->acceptedFileTypes(['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'])
                    ->preserveFilenames()
                    ->openable()
                    ->downloadable()
                    ->previewable()
                    ->maxSize(10240)
                    ->required(),
            ])
            ->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('job.name')->label('Applied Job')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('user.name')->label('Name')->sortable()->searchable(),
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
            'index' => Pages\ListResumes::route('/'),
            'create' => Pages\CreateResume::route('/create'),
            'edit' => Pages\EditResume::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            // only show resumes with job postings made by this user or resumes made by this user
            ->whereHas('job', function ($query) {
                $query->where('user_id', auth()->id());
            })
            ->orWhere('user_id', auth()->id());

    }
}
