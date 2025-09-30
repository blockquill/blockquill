<?php

namespace App\Filament\Actions;

use Filament\Actions\EditAction as ActionsEditAction;

final class EditAction extends ActionsEditAction
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->hiddenLabel();

        $this->icon(__('icons.edit'));

        $this->tooltip('Edit');
    }
}
