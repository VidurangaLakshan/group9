<?php

namespace App\Filament\AlumniLiaison\Resources\CommentResource\Pages;

use App\Filament\AlumniLiaison\Resources\CommentResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateComment extends CreateRecord
{
    protected static string $resource = CommentResource::class;
}
