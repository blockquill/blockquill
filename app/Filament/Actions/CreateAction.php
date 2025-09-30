<?php

namespace App\Filament\Actions;

use Filament\Actions\CreateAction as ActionsCreateAction;

final class CreateAction extends ActionsCreateAction
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->icon(__('icons.create'));

        $this->tooltip('Create');
    }
}
