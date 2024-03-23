<?php

namespace App\Enums;
use Filament\Support\Contracts\HasLabel;
use Illuminate\Support\Str;

enum Role: int implements HasLabel
{
    case Administrator = 1;
    case Editor = 2;
    case StudentSupportServices = 3;
    case Staff = 4;
    case Student = 5;
    case Alumni = 6;

    public function getLabel(): ?string
    {
        // convert the enum key to a string with spaces between the words
        return ucwords(str_replace('_', ' ', Str::snake( $this->name)));
    }
}
