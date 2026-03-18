<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Filament\Notifications\Notification;

class UnderConstruction extends Page
{
    //protected static ?string $navigationLabel = 'Em desenvolvimento';
    protected static ?string $slug = 'under-construction';
    public string $view = 'filament.pages.under-construction';
    protected static ?string $title = '';

    protected static ?int $navigationSort = 999;

    // Se não quiser que apareça no menu lateral, comente navigationLabel ou use shouldRegisterNavigation = false

    public function mount(): void
    {
        Notification::make()
            ->title('Tela em desenvolvimento')
            ->body('Esta funcionalidade está em desenvolvimento e pode apresentar problemas técnicos.')
            ->warning()
            ->send();
    }
}
