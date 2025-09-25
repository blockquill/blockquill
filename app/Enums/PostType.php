<?php

namespace App\Enums;

use App\Contracts\EnumUtilitiesContract;
use App\Traits\EnumUtilitiesTrait;
use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

enum PostType: string implements EnumUtilitiesContract, HasLabel, HasIcon, HasColor
{
    use EnumUtilitiesTrait;

    case ARTICLE = 'article';
    case PAGE = 'page';

    public function getLabel(): string|null
    {
        return match ($this) {
            self::ARTICLE => 'Article',
            self::PAGE => 'Page',
        };
    }

    public function getIcon(): ?string
    {
        return match ($this) {
            self::ARTICLE => 'heroicon-o-document-text',
            self::PAGE => 'heroicon-o-document',
        };
    }

    public function getColor(): ?string
    {
        return match ($this) {
            self::ARTICLE => 'primary',
            self::PAGE => 'secondary',
        };
    }
}