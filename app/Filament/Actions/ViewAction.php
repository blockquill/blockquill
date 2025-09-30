<?php

namespace App\Filament\Actions;

use Filament\Actions\ViewAction as ActionsViewAction;

final class ViewAction extends ActionsViewAction
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->hiddenLabel();

        $this->icon(__('icons.view'));

        $this->tooltip('View');
    }
}
