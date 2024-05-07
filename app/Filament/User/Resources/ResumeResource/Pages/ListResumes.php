<?php

namespace App\Filament\User\Resources\ResumeResource\Pages;

use App\Filament\User\Resources\ResumeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListResumes extends ListRecords
{
    protected static string $resource = ResumeResource::class;

    protected function getHeaderActions(): array
    {
        return [
//            Actions\CreateAction::make(),
        ];
    }
}
