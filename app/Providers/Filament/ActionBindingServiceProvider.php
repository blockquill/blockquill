<?php

namespace App\Providers\Filament;

use Illuminate\Support\ServiceProvider;

class ActionBindingServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(\Filament\Actions\DeleteAction::class, \App\Filament\Actions\DeleteAction::class);
        $this->app->bind(\Filament\Actions\DeleteBulkAction::class, \App\Filament\Actions\BulkDeleteAction::class);
        $this->app->bind(\Filament\Actions\EditAction::class, \App\Filament\Actions\EditAction::class);
        $this->app->bind(\Filament\Actions\ViewAction::class, \App\Filament\Actions\ViewAction::class);
        $this->app->bind(\Filament\Actions\CreateAction::class, \App\Filament\Actions\CreateAction::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
