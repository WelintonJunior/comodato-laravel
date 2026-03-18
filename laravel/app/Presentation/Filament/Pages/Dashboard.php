<?php

namespace App\Filament\Pages;

use Filament\Pages\Dashboard as BaseDashboard;

class Dashboard extends BaseDashboard
{

    // Remove o título exibido pelo Filament
     protected static ?string $title = '';
        public string $view = 'filament.pages.dashboard';
}