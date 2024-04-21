<?php

namespace App\Filament\Alumni\Resources\CommentResource\Pages;

use App\Filament\Alumni\Resources\CommentResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateComment extends CreateRecord
{
    protected static string $resource = CommentResource::class;
}
