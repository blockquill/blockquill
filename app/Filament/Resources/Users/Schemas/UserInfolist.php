<?php

namespace App\Filament\Resources\Users\Schemas;

use App\Models\User;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class UserInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('General Information')
                    ->columnSpanFull()
                    ->columns(2)
                    ->schema([
                        TextEntry::make('name'),
                        TextEntry::make('email')
                            ->label('Email address'),
                        TextEntry::make('email_verified_at')
                            ->dateTime()
                            ->placeholder('-'),
                        TextEntry::make('deleted_at')
                            ->dateTime()
                            ->visible(fn (User $record): bool => $record->trashed()),
                        TextEntry::make('created_at')
                            ->dateTime()
                            ->placeholder('-'),
                        TextEntry::make('updated_at')
                            ->dateTime()
                            ->placeholder('-'),
                    ]),
                Section::make('Roles')
                    ->columnSpanFull()
                    ->schema([
                        TextEntry::make('roles.name')
                            ->hiddenLabel()
                            ->formatStateUsing(fn (string $state) => Str::headline($state))
                            ->placeholder('-')
                            ->badge()
                            ->color('success')
                            ->wrap(),
                    ]),
            ]);
    }
}
