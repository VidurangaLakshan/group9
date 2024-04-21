<?php

namespace App\Filament\User\Resources\CommentResource\Pages;

use App\Filament\User\Resources\CommentResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateComment extends CreateRecord
{
    protected static string $resource = CommentResource::class;
}
