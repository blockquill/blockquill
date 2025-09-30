<?php

namespace App\Filament\Actions;

use App\Exceptions\DeleteActionFailedException;
use Filament\Actions\DeleteAction as ActionsDeleteAction;
use Filament\Notifications\Notification;
use Illuminate\Database\Eloquent\Model;

final class DeleteAction extends ActionsDeleteAction
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->hiddenLabel();

        $this->icon(__('icons.delete'));

        $this->tooltip('Delete');

        $this->action(function (Model $record) {
            try {
                $record->delete();
                $this->success();
            } catch (DeleteActionFailedException $e) {
                Notification::make()
                    ->danger()
                    ->title($e->getMessage())
                    ->send();
                $this->failure();
            }
        });
    }
}
