<?php

namespace App\Filament\User\Resources\ResumeResource\Pages;

use App\Filament\User\Resources\ResumeResource;
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
