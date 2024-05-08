<?php

namespace App\Filament\Sss\Resources\CommentResource\Pages;

use App\Filament\Sss\Resources\CommentResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateComment extends CreateRecord
{
    protected static string $resource = CommentResource::class;
}
