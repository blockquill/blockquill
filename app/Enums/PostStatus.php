<?php

namespace App\Enums;

use App\Contracts\EnumUtilitiesContract;
use App\Traits\EnumUtilitiesTrait;
use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

enum PostStatus: string implements EnumUtilitiesContract, HasColor, HasIcon, HasLabel
{
    use EnumUtilitiesTrait;

    case DRAFT = 'draft';
    case PUBLISHED = 'published';
    case SCHEDULED = 'scheduled';

    public function getLabel(): string
    {
        return match ($this) {
            self::DRAFT => 'Draft',
            self::PUBLISHED => 'Published',
            self::SCHEDULED => 'Scheduled',
        };
    }

    public function getIcon(): string
    {
        return match ($this) {
            self::DRAFT => 'heroicon-o-pencil',
            self::PUBLISHED => 'heroicon-o-check-circle',
            self::SCHEDULED => 'heroicon-o-clock',
        };
    }

    public function getColor(): string
    {
        return match ($this) {
            self::DRAFT => 'gray',
            self::PUBLISHED => 'success',
            self::SCHEDULED => 'warning',
        };
    }
}
