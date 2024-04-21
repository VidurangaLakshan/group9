<?php

namespace App\Filament\Academics\Resources\CommentResource\Pages;

use App\Filament\Academics\Resources\CommentResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateComment extends CreateRecord
{
    protected static string $resource = CommentResource::class;
}
