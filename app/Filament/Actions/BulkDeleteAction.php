<?php

namespace App\Filament\Actions;

use App\Exceptions\DeleteActionFailedException;
use Filament\Actions\DeleteBulkAction;
use Filament\Notifications\Notification;
use Illuminate\Database\Eloquent\Collection;

final class BulkDeleteAction extends DeleteBulkAction
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->action(function (Collection $records) {
            try {
                foreach ($records as $record) {
                    $record->delete();
                }
                Notification::make()
                    ->success()
                    ->title('Record Deleted')
                    ->send();
            } catch (DeleteActionFailedException $e) {
                Notification::make()
                    ->danger()
                    ->title($e->getMessage())
                    ->send();
            }
        });
    }
}
