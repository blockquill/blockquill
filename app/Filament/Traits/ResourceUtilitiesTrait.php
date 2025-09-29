<?php

namespace App\Filament\Traits;

trait ResourceUtilitiesTrait
{
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index'); //@phpstan-ignore-line
    }
}
