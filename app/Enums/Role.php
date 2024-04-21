<?php

namespace App\Enums;
use Filament\Support\Contracts\HasLabel;
use Illuminate\Support\Str;

enum Role: int implements HasLabel
{
    case Administrator = 1;
    case Editor = 2;
    case StudentSupportServices = 3;
    case AlumniRelations = 4;
    case Academics = 5;
    case NonAcademics = 6;
    case Student = 7;
    case Alumni = 8;
    case Clubs = 9;

    public function getLabel(): ?string
    {
        // convert the enum key to a string with spaces between the words
        return ucwords(str_replace('_', ' ', Str::snake( $this->name)));
    }
}
