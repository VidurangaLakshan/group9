<?php

namespace App\Filament\Editor\Resources\CommentResource\Pages;

use App\Filament\Editor\Resources\CommentResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateComment extends CreateRecord
{
    protected static string $resource = CommentResource::class;
}
