<?php

namespace App\Filament\Alumni\Resources\ResumeResource\Pages;

use App\Filament\Alumni\Resources\ResumeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditResume extends EditRecord
{
    protected static string $resource = ResumeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
