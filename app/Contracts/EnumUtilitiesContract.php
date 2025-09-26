<?php

namespace App\Contracts;

interface EnumUtilitiesContract
{
    public function is(int|string $value): bool;

    /**
     * @return array<string>
     */
    public static function getValues(): array;
}
