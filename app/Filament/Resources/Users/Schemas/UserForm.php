<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('General Information')
                    ->columnSpanFull()
                    ->columns(2)
                    ->schema([
                        TextInput::make('name')
                            ->required(),
                        TextInput::make('email')
                            ->label('Email address')
                            ->email()
                            ->required(),
                        DateTimePicker::make('email_verified_at'),
                        TextInput::make('password')
                            ->hiddenOn('edit')
                            ->password()
                            ->required(),
                    ]),
                Section::make('Roles')
                    ->columnSpanFull()
                    ->schema([
                        Select::make('roles')
                            ->hiddenLabel()
                            ->label('Assigned Roles')
                            ->relationship('roles', 'name')
                            ->getOptionLabelFromRecordUsing(fn (Role $record) => Str::headline($record->name))
                            ->multiple()
                            ->preload()
                            ->searchable()
                            ->placeholder('-'),
                    ]),
            ]);
    }
}
