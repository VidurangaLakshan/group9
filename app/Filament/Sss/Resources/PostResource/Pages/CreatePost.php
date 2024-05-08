<?php

namespace App\Filament\Sss\Resources\PostResource\Pages;

use App\Filament\Sss\Resources\PostResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePost extends CreateRecord
{
    protected static string $resource = PostResource::class;
}
