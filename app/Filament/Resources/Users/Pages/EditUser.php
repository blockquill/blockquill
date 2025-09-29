<?php

namespace App\Filament\Resources\Users\Pages;

use App\Filament\Resources\Users\UserResource;
use App\Filament\Traits\ResourceUtilitiesTrait;
use App\Models\User;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Auth;

class EditUser extends EditRecord
{
    use ResourceUtilitiesTrait;

    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make()
                ->hidden(fn (User $record) => ($record->hasRole('super_admin')) || ($record->id === Auth::id())),
            ForceDeleteAction::make()
                ->hidden(fn (User $record) => ($record->hasRole('super_admin')) || ($record->id === Auth::id())),
            RestoreAction::make()
                ->hidden(fn (User $record) => ($record->hasRole('super_admin')) || ($record->id === Auth::id())),
        ];
    }
}
