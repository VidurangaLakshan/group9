<?php

namespace App\Filament\Club\Resources\PostResource\Pages;

use App\Filament\Club\Resources\PostResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePost extends CreateRecord
{
    protected static string $resource = PostResource::class;
}
