<?php

namespace App\Enums;

use App\Contracts\EnumUtilitiesContract;
use App\Traits\EnumUtilitiesTrait;
use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

enum TaxonomyType: string implements EnumUtilitiesContract, HasColor, HasIcon, HasLabel
{
    use EnumUtilitiesTrait;

    case CATEGORY = 'category';
    case TAG = 'tag';

    public function getLabel(): string
    {
        return match ($this) {
            self::CATEGORY => 'Category',
            self::TAG => 'Tag',
        };
    }

    public function getColor(): string
    {
        return match ($this) {
            self::CATEGORY => 'primary',
            self::TAG => 'success',
        };
    }

    public function getIcon(): string
    {
        return match ($this) {
            self::CATEGORY => 'heroicon-o-folder',
            self::TAG => 'heroicon-o-tag',
        };
    }
}
