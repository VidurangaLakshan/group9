<?php

namespace App\Filament\Club\Resources\CommentResource\Pages;

use App\Filament\Club\Resources\CommentResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateComment extends CreateRecord
{
    protected static string $resource = CommentResource::class;
}
