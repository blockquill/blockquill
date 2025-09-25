<?php

namespace App\Traits;

trait EnumUtilitiesTrait
{
    public function is(int|string|null $value): bool
    {
        return $this->value === $value;
    }

    /**
     * @return array<string|int>
     */
    public static function getValues(): array
    {
        return array_map(fn ($case) => $case->value, self::cases());
    }
}
